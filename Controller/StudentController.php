<?php
require './Model/Connect.php';

class StudentController
{

    public function render()
    {
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $students = $connect->getFromTable($pdo, 'student');

        // this belongs in the classroom class
        $classes = $connect->getFromTable($pdo, 'classroom');

        $allStudents = [];
        foreach ($students as $student) {
            $person = new Student($student['id'], $student['name'], $student['email'], $student['class']);
            array_push($allStudents,$person);
        }

        //this is just example code, you can remove the line below

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = "INSERT INTO student (name, email, class) VALUES (:name, :email, :class)";
         //   var_dump($pdo);
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'class' => $_POST['class']
            ])) {
               echo 'i worked';
            } else {
                echo 'failed';
            };
        }

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/student.php';
    }

}


