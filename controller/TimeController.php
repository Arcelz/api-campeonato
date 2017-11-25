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
        $animal = new Animal();
        if (!empty($param)) {
            foreach ($param as $key => $val) {
                $var = "set" . ucfirst($key);
                if (method_exists($animal, 'set' . ucfirst($key))) {
                    $animal->$var($val);
                } else {
                    View::render([
                        "status" => 400,
                        "message" => "Parametro invalido " . $key
                    ]);
                }
            }
        }
        View::render($animal->pesquisar());
    }

    public function put($param)
    {
        $animal = new Animal();
        if (isset($param['idAnimal'])) {
            $data = (new DataConversor())->converter();
            $animal->setIdAnimal($param['idAnimal']);
            if (isset($data['codigoBrinco'])) {
                $animal->setCodigoBrinco($data['codigoBrinco']);
            }
            if (isset($data['codigoRaca'])) {
                $animal->setCodigoRaca($data['codigoRaca']);
            }
            if (isset($data['nomeAnimal'])) {
                $animal->setNomeAnimal($data['nomeAnimal']);
            }
            if (isset($data['dataNascimento'])) {
                $animal->setDataNascimento($data['dataNascimento']);
            }
            if (isset($data['fkPesagem'])) {
                $animal->setFkPesagem($data['fkPesagem']);
            }
            if (isset($data['fkMae'])) {
                $animal->setFkMae($data['fkMae']);
            }
            if (isset($data['fkPai'])) {
                $animal->setFkPai($data['fkPai']);
            }
            if (isset($data['fkLote'])) {
                $animal->setFkLote($data['fkLote']);
            }
            if (isset($data['fkFazenda'])) {
                $animal->setFkFazenda($data['fkFazenda']);
            }
            View::render($animal->alterar());
        }
    }

    public function delete($param)
    {
        $animal = new Animal();
        if (isset($param['idAnimal'])) {
            $animal->setIdAnimal($param['idAnimal']);
            View::render($animal->deletar());
        }
    }
}