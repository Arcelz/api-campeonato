<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * Date: 27/11/2017
 * Time: 01:29
 */

namespace model;


class Jogador
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nickname;
    /**
     * @var string
     */
    private $elo;
    /**
     * @var string
     */
    private $lane;

    /**
     * @return int
     */
    public function getId(): int
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
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getElo(): string
    {
        return $this->elo;
    }

    /**
     * @param string $elo
     */
    public function setElo(string $elo)
    {
        $this->elo = $elo;
    }

    /**
     * @return string
     */
    public function getLane(): string
    {
        return $this->lane;
    }

    /**
     * @param string $lane
     */
    public function setLane(string $lane)
    {
        $this->lane = $lane;
    }




}