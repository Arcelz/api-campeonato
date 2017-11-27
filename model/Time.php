<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 12/09/2017
 * Time: 23:52
 */

namespace model;


use ArrayObject;
use model\dao\OrganizacaoDAO;
use model\dao\TimeDAO;
use util\ClassToArray;

/**
 * Class Time de jogadores de LoL.
 * @package model
 */
class Time implements IModel
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var ArrayObject<Jogador>
     */
    private $jogadores;
    /**
     * @var boolean
     */
    private $pago;
    /**
     * @var int
     */
    private $organizacao_id;

    /**
     * Time constructor.
     */
    public function __construct()
    {
        $this->jogadores = new ArrayObject();
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
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
     * @param string $nome
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * @param bool $pago
     */
    public function setPago(bool $pago)
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
     * @param int $organizacao_id
     */
    public function setOrganizacaoId(int $organizacao_id)
    {
        $this->organizacao_id = $organizacao_id;
    }

    /**
     * Adiciona um objeto de jogador ao ArrayObject;
     * @param Jogador $jogador
     */
    public function addJogador(Jogador $jogador)
    {
        $this->jogadores->append($jogador);
    }


    /**
     * @return array
     */
    public function cadastrar()
    {
        $this->setOrganizacaoId((new OrganizacaoDAO())->retrave());
        $array = (new ClassToArray())->classToArray($this);
        return (new TimeDAO())->create($array);

    }

    /**
     * @return array
     */
    public function alterar()
    {
        $array = (new ClassToArray())->classToArray($this);
        return (new TimeDAO())->update($array);
    }

    /**
     * @return array
     */
    public function pesquisar()
    {
        $array = (new ClassToArray())->classToArray($this);
        return (new TimeDAO())->retrave($array, (new OrganizacaoDAO())->retrave());
    }

    /**
     * @return array
     */
    public function deletar()
    {
        $array = (new ClassToArray())->classToArray($this);
        return (new TimeDAO())->delete($array);
    }
}