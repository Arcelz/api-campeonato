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
use util\ClassToArray;

class Time implements IModel
{
    private $id;
    private $nome;
    private $jogador1;
    private $jogador2;
    private $jogador3;
    private $jogador4;
    private $jogador5;
    private $jogador6;
    private $jogador7;
    private $jogador8;
    private $jogador9;
    private $jogador10;
    private $pago;
    private $organizacao_id;

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getJogador1()
    {
        return $this->jogador1;
    }

    /**
     * @param mixed $jogador1
     */
    public function setJogador1($jogador1)
    {
        $this->jogador1 = $jogador1;
    }

    /**
     * @return mixed
     */
    public function getJogador2()
    {
        return $this->jogador2;
    }

    /**
     * @param mixed $jogador2
     */
    public function setJogador2($jogador2)
    {
        $this->jogador2 = $jogador2;
    }

    /**
     * @return mixed
     */
    public function getJogador3()
    {
        return $this->jogador3;
    }

    /**
     * @param mixed $jogador3
     */
    public function setJogador3($jogador3)
    {
        $this->jogador3 = $jogador3;
    }

    /**
     * @return mixed
     */
    public function getJogador4()
    {
        return $this->jogador4;
    }

    /**
     * @param mixed $jogador4
     */
    public function setJogador4($jogador4)
    {
        $this->jogador4 = $jogador4;
    }

    /**
     * @return mixed
     */
    public function getJogador5()
    {
        return $this->jogador5;
    }

    /**
     * @param mixed $jogador5
     */
    public function setJogador5($jogador5)
    {
        $this->jogador5 = $jogador5;
    }

    /**
     * @return mixed
     */
    public function getJogador6()
    {
        return $this->jogador6;
    }

    /**
     * @param mixed $jogador6
     */
    public function setJogador6($jogador6)
    {
        $this->jogador6 = $jogador6;
    }

    /**
     * @return mixed
     */
    public function getJogador7()
    {
        return $this->jogador7;
    }

    /**
     * @param mixed $jogador7
     */
    public function setJogador7($jogador7)
    {
        $this->jogador7 = $jogador7;
    }

    /**
     * @return mixed
     */
    public function getJogador8()
    {
        return $this->jogador8;
    }

    /**
     * @param mixed $jogador8
     */
    public function setJogador8($jogador8)
    {
        $this->jogador8 = $jogador8;
    }

    /**
     * @return mixed
     */
    public function getJogador9()
    {
        return $this->jogador9;
    }

    /**
     * @param mixed $jogador9
     */
    public function setJogador9($jogador9)
    {
        $this->jogador9 = $jogador9;
    }

    /**
     * @return mixed
     */
    public function getJogador10()
    {
        return $this->jogador10;
    }

    /**
     * @param mixed $jogador10
     */
    public function setJogador10($jogador10)
    {
        $this->jogador10 = $jogador10;
    }

    /**
     * @return mixed
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * @param mixed $pago
     */
    public function setPago($pago)
    {
        $this->pago = $pago;
    }

    /**
     * @return mixed
     */
    public function getOrganizacaoId()
    {
        return $this->organizacao_id;
    }

    /**
     * @param mixed $organizacao_id
     */
    public function setOrganizacaoId($organizacao_id)
    {
        $this->organizacao_id = $organizacao_id;
    }




    public function cadastrar()
    {
        $this->setOrganizacaoId((new OrganizacaoDAO())->retrave());
        $array = (new ClassToArray())->classToArray($this);
        return (new TimeDAO())->create($array);

    }

    public function alterar()
    {
        $array = (new ClassToArray())->classToArray($this);
        return (new AnimalDAO())->update($array);
    }

    public function pesquisar()
    {
        $array = (new ClassToArray())->classToArray($this);
        return (new AnimalDAO())->retrave($array, $this->limite);
    }

    public function deletar()
    {
        $array = (new ClassToArray())->classToArray($this);
        return (new AnimalDAO())->delete($array);
    }
}