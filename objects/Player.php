<?php
/**
 * Created by PhpStorm.
 * User: ejcka
 * Date: 2/20/2018
 * Time: 9:08 PM
 */

class Player
{
    private $_name;
    private $_gender;
    function __construct($name, $gender)
    {
        $this->_name = $name;
        $this->_gender = $gender;
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

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

}