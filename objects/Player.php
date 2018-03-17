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
    private $_fname;
    private $_lname;

    public function __construct($fname, $lname)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_deaths = 0;
        $this->_score = 0;
    }

    public function playerDeath()
    {
        $this->setDeaths($this->getDeaths() + 1);
        $this->deductPoints(5);
    }

    /**
     * @param int $points
     */
    public function deductPoints($points)
    {
        $newScore = $this->getScore() - $points;
        if($newScore < 0){
            $newScore = 0;
        }
        $this->setScore($newScore);
    }

    /**
     * @param int $points
     */
    public function awardPoints($points)
    {
        $newScore = $this->getScore() + $points;
        $this->setScore($newScore);
    }

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
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

}