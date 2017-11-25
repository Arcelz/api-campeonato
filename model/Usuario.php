<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 12/09/2017
 * Time: 23:52
 */

namespace model;


use model\dao\OrganizacaoDAO;
use model\dao\TimeDAO;
use model\dao\UsuarioDAO;
use util\ClassToArray;

class Usuario implements IModel
{
    private $id;
    private $username;
    private $email;
    private $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function cadastrar()
    {
        $array = (new ClassToArray())->classToArray($this);
        return (new UsuarioDAO())->login($array);
    }

    public function alterar()
    {

    }

    public function pesquisar()
    {

    }

    public function deletar()
    {

    }
}