<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

//session start() wont work if there is space or any echo statement after php or before php

require "vendor/autoload.php";
require_once ('model/validation-functions.php');

session_start();

$f3 = Base::instance();
$f3->set('DEBUG', 3);
$controller = new PetController($f3);
$f3->set('colors', array('pink', 'black', 'brown', 'white'));

$db = new Database();

$f3->route('GET /',function ($f3)
{
    $GLOBALS['controller']->home();
});

$f3->route('GET /@item', function($f3, $params) {
    $animal = $params['item'];

    if ($animal == 'chicken') {
        echo 'Cluck!';
    }
    else if ($animal == 'dog') {
        echo 'Woof!';
    }
    else if ($animal == 'cat') {
        echo 'Meow!';
    }
    else if ($animal == 'cow') {
        echo 'Moo!';
    }
    else if ($animal == 'donkey') {
        echo 'Hee Haw!';
    }
    else {
        $f3->error(404);
    }


});

$f3->route('GET|POST /order',function ($f3){
    $GLOBALS['controller']->order();
});

$f3->route('GET|POST /order2',function ($f3)
{
    $GLOBALS['controller']->order2();
});

$f3->route('GET /show', function($f3) {
    $GLOBALS['controller']->show();
});



//$f3->route('POST /results',function ()
//{
//
//
//});

$f3->run();