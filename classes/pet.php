<?php

class Pet
{
    private $_name;
    private $_color;
    private $_type;


    // default constructor
    function __construct($name = "Fido", $color = "Blue", $type = "animal")
    {
        $this->_name = $name;
        $this->_color = $color;
        $this->_type = $type;
    }

    function getName()
    {
        return $this->_name;
    }

    function setType($type)
    {
        $this->_type = $type;
    }

    function getType()
    {
        return $this->_type;
    }

    function setName($name)
    {
        $this->_name = $name;
    }

    function setColor($color)
    {
        $this->_color = $color;
    }

    function getColor()
    {
        return $this->_color;
    }

    function eat()
    {
        echo $this->_name . " is eating<br>";
    }

    function talk()
    {
        echo $this->_name ." is talking<br>";
    }

    function colorOfPet()
    {
        echo $this->_name . " is " . $this->_color  ;
    }
}