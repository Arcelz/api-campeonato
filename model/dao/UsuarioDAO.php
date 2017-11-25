<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13/09/2017
 * Time: 00:01
 */

namespace model\dao;


use bd\Banco;
use Exception;
use PDO;
use util\Token;

class UsuarioDAO
{

    public function login($obj)
    {
        $codigo = 400;
        $messagem = "Erro inesperado";
        try {
            $db = Banco::conexao();
            $query = "SELECT * FROM user WHERE email=:email";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $obj['email'], PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $senha2 = $result['password'];
            $token = false;
            if (password_verify($obj['password'], $senha2)) {
                $codigo = 200;
                $messagem = "Usuario Logado";
                $token = true;
            } else {
                $codigo = 200;
                $messagem = "Dados incorretos";
            }
        } catch (Exception $e) {
            $codigo = 400;
            $messagem = $e->getMessage();
        }
        $retorno = [
            "codigo" => $codigo,
            "mensagem" => $messagem
        ];
        if($token){
            $retorno['token'] = (String)(new Token())->gerarToken();
        }
        return $retorno;

    }
}