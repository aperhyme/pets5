<?php

class PetController
{
    private $_f3;
    private $_val;

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /**
     *
     */
    public function home()
    {
        echo "<h1>My pets </h1>";
        echo"<a href='order'>Order a pet</a>";
    }

    public function order()
    {
        $_SESSION = [];

        if(isset($_POST['animal'])) {
            $animal = $_POST['animal'];
            if(validString($animal)) {
                if($animal == "dog"){
                    $_SESSION['animal'] = new Dog();
                }
                else if($animal == "cat"){
                    $_SESSION['animal'] = new Cat();
                }
                else if($animal == "bird"){
                    $_SESSION['animal'] = new Bird();
                }
                else{
                    $_SESSION['animal'] = new Pet();
                }
                $_SESSION['animal']->setType($animal);
                $this->_f3->reroute('/order2');
            }
            else {
                $this->_f3->set("errors['animal']", "Please enter an animal");
                $this->_f3->set('type', $animal);
            }
        }
        $view = new Template();//template object
        echo $view-> render('views/form1.html');
        //use it to render the main page
    }

    public function order2()
    {

        if(isset($_POST['color'])) {
            $color = $_POST['color'];
            $name = $_POST['name'];
            $this->_f3->set('name', $name);
            $this->_f3->set('color', $color);
            if(validColor($color)) {
                if(validString($name)) {
                    $_SESSION['animal']->setColor($color);
                    $_SESSION['animal']->setName($name);
                    $animal = $_SESSION['animal'];
                    //Write pet to the database
                    $GLOBALS['db']->writePet($animal);

                    $view = new Template();//template object
                    echo $view-> render('views/results.html');
                    return;
                }
            }
            else {
                $this->_f3->set("errors['color']", "Please select a valid color");
            }
        }
        $view = new Template();//template object
        echo $view-> render('views/form2.html');//use it to render the main page
    }

    public function show()
    {
        $pets = $GLOBALS['db']->getPets();

        $this->_f3->set('pets', $pets);
        $view = new Template();
        echo $view-> render('views/show.html');
    }
}