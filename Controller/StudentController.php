<?php

class StudentController
{

    public function render()
    {
        require 'Model/Connect.php';
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $students = $connect->getFromTable($pdo, 'student');
        $studentId = [];

        $allStudents = [];
     /*   foreach ($students as $student) {
            $person = new Student($student['id'], $student['name'], $student['email'], $student['class']);
            array_push($allStudents,$person);
        } */
//        $classroom = $connect ->getClassroomName($pdo, $student['id']);
//        $classroom = $connect ->getClassroomName($pdo, $user->getId());


        foreach ($students as $i => $student) {
            array_push($studentId, $student['id']);
            $classroomName = $connect->getClassroomName($pdo, $student['class']);
            $person = new Student($student['id'], $student['name'], $student['email'], $classroomName[0]['name']);
            array_push($allStudents,$person);
        }


        //add student
        if (array_key_exists('name', $_POST) &&
            array_key_exists('email', $_POST) &&
            array_key_exists('class', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->addStudent($pdo, $_POST['name'], $_POST['email'], $_POST['class']);
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }
        //edit student
        if (array_key_exists('edit', $_POST)) {
            require 'Controller/EditController.php';
            $controller = new EditController();
            $controller->render('student', $_POST["edit"]);
        }
        if (array_key_exists('confirm', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->updateStudent($pdo, $_SESSION['editId'], $_POST['editName'], $_POST['editEmail'], $_POST['editClass']);
            $_POST = [];
            $_SESSION = [];;
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //delete student
        if(array_key_exists('delete',$_POST)){
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteById($pdo, 'student', $_POST['delete']);
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //deleteWholeTable
        if(array_key_exists('tableDelete', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteTable($pdo, 'student');
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        //createWHOLETABLE
        if(array_key_exists('tableCreate', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->createTable($pdo, 'student');
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        require 'View/student.php';
    }

}


