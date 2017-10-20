<?php

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Contato extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $contato_id;

    /**
     *
     * @var string
     * @Column(type="string", length=256, nullable=false)
     */
    protected $nome;

    /**
     *
     * @var string
     * @Column(type="string", length=256, nullable=false)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    protected $telefone;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    protected $whatsapp;

    /**
     *
     * @var string
     * @Column(type="string", length=3000, nullable=false)
     */
    protected $msg;

    /**
     * Method to set the value of field contato_id
     *
     * @param integer $contato_id
     * @return $this
     */
    public function setContatoId($contato_id)
    {
        $this->contato_id = $contato_id;

        return $this;
    }

    /**
     * Method to set the value of field nome
     *
     * @param string $nome
     * @return $this
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field telefone
     *
     * @param string $telefone
     * @return $this
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Method to set the value of field whatsapp
     *
     * @param integer $whatsapp
     * @return $this
     */
    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    /**
     * Method to set the value of field msg
     *
     * @param string $msg
     * @return $this
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * Returns the value of field contato_id
     *
     * @return integer
     */
    public function getContatoId()
    {
        return $this->contato_id;
    }

    /**
     * Returns the value of field nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Returns the value of field whatsapp
     *
     * @return integer
     */
    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    /**
     * Returns the value of field msg
     *
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("paulocesarweb");
        $this->setSource("contato");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'contato';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contato[]|Contato|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contato|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
