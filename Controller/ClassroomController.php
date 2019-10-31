<?php


class ClassroomController
{
    public function render()
    {
        require 'Model/Connect.php';
        //this is just example code, you can remove the line below
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $classes = $connect->getFromTable($pdo, 'classroom');

        $allClasses = [];
        foreach ($classes as $class) {
            $person = new Classroom($class['id'], $class['name'], $class['location']);
            array_push($allClasses,$person);
        }

        if(array_key_exists('delete',$_POST)){
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteById($pdo, 'classroom', $_POST['delete']);
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //add class
        if (array_key_exists('name', $_POST) &&
            array_key_exists('location', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->addClassroom($pdo, $_POST['name'], $_POST['location']);
            var_dump($_POST);
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }
        //edit class
        if (array_key_exists('edit', $_POST)) {
            require 'Controller/EditClassroomController.php';
            $controller = new EditClassroomController();
            $controller->render('classroom', $_POST["edit"]);
        }
        if (array_key_exists('confirm', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->updateClassroom($pdo, $_SESSION['editId'], $_POST['editName'], $_POST['editLocation']);
            $_POST = [];
            $_SESSION = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }
        //delete class
        if(array_key_exists('delete',$_POST)){
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteById($pdo, 'class', $_POST['delete']);
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //deleteWholeTable
        if(array_key_exists('tableDelete', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteTable($pdo, 'classroom');
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //createWHOLETABLE
        if(array_key_exists('tableCreate', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->createTable($pdo, 'classroom');
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/classroom.php';
    }
}