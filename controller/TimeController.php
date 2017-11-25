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
use model\validate\AnimalValidate;
use model\validate\TimeValidate;
use util\DataConversor;
use util\Token;
use view\View;

class TimeController implements IController
{

    public function post()
    {
        $time = new Time();
        $data = (new DataConversor())->converter();
        $valida = (new TimeValidate())->validatePost($data);
        if ($valida === true) {
            $time->setNome($data['nome']);
            $time->setJogador1($data['jogador1']);
            $time->setJogador2($data['jogador2']);
            $time->setJogador3($data['jogador3']);
            $time->setJogador4($data['jogador4']);
            $time->setJogador5($data['jogador5']);
            if (isset($data['jogador6'])) {
                $time->setJogador6($data['jogador6']);
            }
            if (isset($data['jogador7'])) {
                $time->setJogador7($data['jogador7']);
            }
            if (isset($data['jogador8'])) {
                $time->setJogador8($data['jogador8']);
            }
            if (isset($data['jogador9'])) {
                $time->setJogador9($data['jogador9']);
            }
            if (isset($data['jogador10'])) {
                $time->setJogador10($data['jogador10']);
            }
            View::render($time->cadastrar());
        } else {
            View::render($valida);
        }
    }

    public function get($param)
    {
        $time = new Time();
        if (!empty($param)) {
            foreach ($param as $key => $val) {
                $var = "set" . ucfirst($key);
                if (method_exists($time, 'set' . ucfirst($key))) {
                    $time->$var($val);
                } else {
                    View::render([
                        "status" => 400,
                        "message" => "Parametro invalido " . $key
                    ]);
                }
            }
        }
        View::render($time->pesquisar());
    }

    public function put($param)
    {
        if ((new Token())->token()) {
            $animal = new Time();
            if (isset($param['id'])) {
                $data = (new DataConversor())->converter();
                $animal->setId($param['id']);
                if (isset($data['nome'])) {
                    $animal->setNome($data['nome']);
                }
                if (isset($data['jogador1'])) {
                    $animal->setJogador1($data['jogador1']);
                }
                if (isset($data['jogador2'])) {
                    $animal->setJogador2($data['jogador2']);
                }
                if (isset($data['jogador3'])) {
                    $animal->setJogador3($data['jogador3']);
                }
                if (isset($data['jogador4'])) {
                    $animal->setJogador4($data['jogador4']);
                }
                if (isset($data['jogador5'])) {
                    $animal->setJogador5($data['jogador5']);
                }
                if (isset($data['jogador6'])) {
                    $animal->setJogador6($data['jogador6']);
                }
                if (isset($data['jogador7'])) {
                    $animal->setJogador7($data['jogador7']);
                }
                if (isset($data['jogador8'])) {
                    $animal->setJogador8($data['jogador8']);
                }
                if (isset($data['jogador9'])) {
                    $animal->setJogador9($data['jogador9']);
                }
                if (isset($data['jogador10'])) {
                    $animal->setJogador10($data['jogador10']);
                }
                if (isset($data['pago'])) {
                    $animal->setPago($data['pago']);
                }

                View::render($animal->alterar());
            }
        }
    }

    public function delete($param)
    {
        if ((new Token())->token()) {
            $animal = new Time();
            if (isset($param['id'])) {
                $animal->setId($param['id']);
                View::render($animal->deletar());
            }
        }
    }
}