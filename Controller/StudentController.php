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
        }
        //TODO edit student

        //delete student
        if(array_key_exists('delete',$_POST)){
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteById($pdo, 'student', $_POST['delete']);
            $_POST = [];
        }

        //deleteWholeTable
        if(array_key_exists('tableDelete', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteTable($pdo, 'student');
            $_POST = [];
        }

        //createWHOLETABLE
        if(array_key_exists('tableCreate', $_POST)) {
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->createTable($pdo, 'studentA');
            $_POST = [];
        }


        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/student.php';
    }

}


