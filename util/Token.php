<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 27/08/2017
 * Time: 14:30
 */

namespace util;

use Exception;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class Token
{
    public function tokenVazio()
    {
        if (isset(apache_request_headers()["Authorization"])) {// Pega o token do cabeçalho) {//verifica se o cabeçãlho com a authorization esta vazio
            return true;
        } else {
            return false;
        }
    }

    public function recebeToken()
    {
        return apache_request_headers()["Authorization"];// Pega o token do cabeçalho
    }

    public function validaToken($token)
    {
        try {
            $parser = new Parser();
            $oToken = $parser->parse($token);
            $signer = new Sha256();//define a assinatura da chave
            $expirado = $oToken->isExpired();
            $tokenValido = $oToken->verify($signer, 'lolcamp@123@camp@api'); // onde contem a chave e é verificado o token
            if ($expirado == false && $tokenValido == true) {
                return true;// retorna true quando o token estiver valido e com sua validade
            } else {
                return false; // retorna false se o token nao for valido ou a validade estiver expirada
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function token()
    {
        if (Token::tokenVazio()) {//verifica se o cabeçãlho com a authorization esta vazio
            $token = Token::recebeToken();
            if (Token::validaToken($token)) {
                return true;
            } else {
                header('HTTP/1.0 400 Token Invalido');
                die();
            }
        } else {
            header('HTTP/1.0 401 Não Autorizado');
            die();
        }
    }

    public function gerarToken()
    {
        $signer = new Sha256();
        return  (new Builder())->setIssuer('api.camp')// Configures the issuer (iss claim)
        ->setAudience('lolcamp.com')// Configures the audience (aud claim)
        ->setId('123camp456', true)// Configura o id (jti claim), replicating as a header item
        ->setIssuedAt(time())// Configures the time that the token was issue (iat claim)
        ->setNotBefore(time() + 60)// Configures the time that the token can be used (nbf claim)
        ->setExpiration(time() + 3600)// Configura a data de expiração do token
        ->sign($signer, 'lolcamp@123@camp@api')// cria uma chave de assinatura privada
        ->getToken(); // Recupera o token
    }
}