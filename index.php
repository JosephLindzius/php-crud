<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
session_start();

//include all your model files here
require 'Model/User.php';
require 'Model/Student.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/StudentController.php';
//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!
//$controller = new HomepageController();
//$controller->render($_GET, $_POST);

$controller = new StudentController();
$controller->render($_GET, $_POST);







