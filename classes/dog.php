<?php

class Dog extends Pet
{
    function fetch()
    {
        echo "<p>" . $this->getName() . " is fetching.</p>";
    }

    function talk()
    {
        echo $this->getName() . " is barking";
    }
}
// end of dog class