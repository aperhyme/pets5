<?php

class Bird extends Pet
{
    private $_gender;

    function setGender($gender)
    {
        $this->_gender = $gender;
    }

    function getGender()
    {
        return $this->_gender;
    }

    function talk()
    {
        echo $this->getName() . " is squawking";
    }
}