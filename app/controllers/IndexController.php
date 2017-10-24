<?php

use Db\Contato as ContatoDB;
use Model\Contato as ContatoModel;
use PHPMailer\PHPMailer as PHPMailer;
use PHPMailer\Exception as ExceptionMailer;

class IndexController extends ControllerBase {

    public function indexAction() {
        
        $request = $this->request;
        
        if ($request->isPost()) {
            
            if ($request->isAjax()) {
                
                $email = new PHPMailer(true);
                try {
                    $dados = $request->getPost();
                    
                    $ContatoModel = new ContatoModel();
                    $ContatoModel->setNome($dados['nome']);
                    $ContatoModel->setEmail($dados['email']);
                    $ContatoModel->setTelefone(preg_replace('/[^0-9]/', '', $dados["telefone"]));
                    $ContatoModel->setWhatsapp($dados['whatsapp']);
                    $ContatoModel->setMsg($dados['mensagem']);
                    
                    if ($ContatoModel->save()) 
                        $this->sendEmail('contato', 'paulo.hendges@gmail.com', $dados);
                        $retorno = ['success' => true, 'msg' => 'Pronto! Obrigado por entrar em contato'];
                        return $this->jsonResponse($retorno);
                        
                } catch (Exception $ex) {
                    $retorno = ['success' => false, 'ex' => $ex, 'msg' => 'Algo ocorreu errado no envio, por favor tente novamente mais tarde!'];
                    return $this->jsonResponse($retorno);
                }
                
            }
            
        }
        
    }
    
}
