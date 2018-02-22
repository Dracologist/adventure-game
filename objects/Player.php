<?php
/**
 * Created by PhpStorm.
 * User: ejcka
 * Date: 2/20/2018
 * Time: 9:08 PM
 */

class Player
{
    private $_score;
    private $_deaths;
    private $_name;
    function __construct($name)
    {
        $this->_name = $name;
        $this->_deaths = 0;
        $this->_score = 0;
    }

    public function playerDeath()
    {
        $this->setDeaths($this->getDeaths() + 1);
        $this->deductPoints(5);
    }

    public function deductPoints($loss)
    {
        $this->setScore($this->getScore() - $loss);
    }

    public function awardPoints($gain)
    {
        $this->setScore($this->getScore() + $gain);
    }

    /**
     * @return int
     */
    public function getDeaths()
    {
        return $this->_deaths;
    }

    /**
     * @param int $deaths
     */
    public function setDeaths($deaths)
    {
        $this->_deaths = $deaths;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->_score;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->_score = $score;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

}