<?php
/**
 * Created by PhpStorm.
 * User: ejcka
 * Date: 2/20/2018
 * Time: 9:08 PM
 */

class Player
{
    private $_fname;
    private $_lname;

    public function __construct($fname, $lname)
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
    }

    public function playerDeath()
    {
        return "<h1>You died!</h1>";
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