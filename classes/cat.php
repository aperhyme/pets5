<?php

class Cat extends Pet
{
    function talk()
    {
        echo $this->getName() . " is meowing";
    }
}