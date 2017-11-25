<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 12/09/2017
 * Time: 23:50
 */

namespace controller;


use model\Animal;
use model\Time;
use model\Usuario;
use model\validate\AnimalValidate;
use model\validate\LoginValidate;
use model\validate\TimeValidate;
use util\DataConversor;
use view\View;

class LoginController
{

    public function post()
    {
        $time = new Usuario();
        $data = (new DataConversor())->converter();
        $valida = (new LoginValidate())->validatePost($data);
        if ($valida === true) {
            $time->setEmail($data['email']);
            $time->setPassword($data['password']);
            View::render($time->cadastrar());
        } else {
            View::render($valida);
        }
    }

    public function get($param)
    {

    }

    public function put($param)
    {

    }

    public function delete($param)
    {

    }
}