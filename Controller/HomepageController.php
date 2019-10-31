<?php

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render()
    {   require 'Model/Connect.php';
        //this is just example code, you can remove the line below
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $students = $connect->getFromTable($pdo, 'student');
        $teachers = $connect->getFromTable($pdo, 'teacher');
        $classrooms = $connect->getFromTable($pdo, 'classroom');
        $allStudents = [];
        foreach ($students as $i => $student) {
            $person = new Student($student['id'], $student['name'], $student['email'], $student['class']);
            array_push($allStudents, $person);
        }

        $allTeachers = [];
        foreach ($teachers as $i => $teacher) {
            $person = new Teacher($teacher['id'], $teacher['name'], $teacher['email'], $teacher['class']);
            array_push($allTeachers, $person);
        }

        $allClassrooms = [];
        foreach ($classrooms as $i => $classroom) {
            $class = new Classroom($classroom['id'], $classroom['name'], $classroom['location']);
            array_push($allClassrooms, $class);
        }
        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }

}