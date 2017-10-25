<?php

use Phalcon\Mvc\Controller;
use PHPMailer\PHPMailer as PHPMailer;
use PHPMailer\Exception as ExceptionMailer;

class ControllerBase extends Controller
{
    /**
     * Retorna uma resposta json para o browser.
     * 
     * Parâmetros:
     * $params['setContentType'] bool (opcional) Se deve ser enviado o cabeçalho de que
     *     o conteúdo é json. Default: true
     * 
     * @param mixed $json   Informação que será enviada em formato json.
     * @param array $params Opções (explicação acima).
     * 
     * @return \Phalcon\Http\Response
     */
    protected function jsonResponse($json, array $params = array())
    {
        if ( ! isset($json['success'])) {
            throw new \Infra\Exception('parametro sucess obrigatorio');
        }
        
        $this->view->disable();

        $response = new \Phalcon\Http\Response();
        $response->setJsonContent($json);
        $setContentType = isset($params['setContentType']) ? $params['setContentType'] : true;
        
        if ($setContentType) {
            $response->setContentType('application/json', 'UTF-8');
        }

        return $response;
    }
    
    protected function sendEmail($nameView, $to, $dados){
        $mail = new PHPMailer();
        $emailConfigs = $this->config->email->toArray();
        
        
        $mail->IsSMTP(); 
        $mail->Host = "smtp.umbler.com";
        $mail->Port = 587;
        $mail->SMTPAutoTLS = false; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'paulocesar@paulocesarweb.com.br';
        $mail->Password = '@Juninhendges1508';
        
        $mail->addAddress($to);
        $mail->From = 'paulocesar@paulocesarweb.com.br';
        $mail->FromName = 'Paulo Cesar Web - Contato';
        $mail->isHTML(true);
        
        $mail->Subject = "Contato";
        $mail->Body = $this->getTemplate($nameView, $dados);
        
        $sended = $mail->Send();
//        $sended = true;
        
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();
        
        if ($sended) {
          return true;
        }
    }
    
    public function getTemplate($name, $dados) {
        $parameters = array_merge(array(
            'baseUri' => $this->config->application->baseUri,
                ), $dados);
        
        $view = new \Phalcon\Mvc\View();
        
        $view->setViewsDir($this->di->getShared('config')->application->viewsDir);
        $view->registerEngines(array(
            '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
        ));
        $view->setDI($this->di);
        $view->setMainView('email/layout');
        $view->setVars($parameters);
        
        ob_start();
        $view->render('email', $name);
        $content = ob_get_contents();
        ob_end_clean(); 
        
        return $content; 
    } 
}
