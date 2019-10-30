<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
session_start();

function whatIsHappening()
{

    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
    //echo '<h2>$_SERVER</h2>';
    //var_dump($_SERVER);

}

//include all your model files here
require 'Model/User.php';
require 'Model/Student.php';
require 'Model/Classroom.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/StudentController.php';
require  'Controller/ClassroomController.php';
//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!
//$controller = new HomepageController();
//$controller->render($_GET, $_POST);

//$controller = new StudentController();
//$controller->render();

$controller = new ClassroomController();
$controller->render();






