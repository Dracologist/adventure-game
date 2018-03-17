<?php
/**
 * Created by PhpStorm.
 * User: ejcka
 * Date: 2/20/2018
 * Time: 9:08 PM
 */

class Player
{
    protected $_score = 10;
    protected $_deaths = 0;
    private $_fname;
    private $_lname;

    public function __construct($fname, $lname)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
    }

    public function playerDeath()
    {
        return "<h1>You died!</h1>".$this->setDeaths($this->getDeaths() + 1).$this->deductPoints();
    }

    public function deductPoints()
    {
        $newScore = $this->getScore() - 5;
        if($newScore < 0){
            $newScore = 0;
        }
        return "<p>You lost 5 points!</p>".$this->setScore($newScore);
    }

    public function awardPoints()
    {
        return "<p>You received 10 points!"."</p>".$this->setScore($this->getScore() + 10);
    }

    public function getDeaths()
    {
        return $this->_deaths;
    }

    /**
     * @param int $deaths
     * @return string message
     */
    public function setDeaths($deaths)
    {
        $this->_deaths = $deaths;
        return "<p>You have died ".$this->getDeaths()." times so far.</p>";
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
     * @return string message
     */
    public function setScore($score)
    {
        $this->_score = $score;
        return "<p>Your current score is ".$this->getScore()."</p>";
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
     * @return string message
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

}