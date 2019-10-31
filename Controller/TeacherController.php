<?php


class TeacherController
{
    public function render()
    {   require 'Model/Connect.php';
        $con = new Connect();
        $pdo = $con->openConnection();
        $teachers = $con->getFromTable($pdo, 'teacher');

        $allTeachers = [];
        foreach ($teachers as $teacher) {
            $person = new Teacher($teacher['id'], $teacher['name'], $teacher['email'], $teacher['class']);
            array_push($allTeachers,$person);
        }

        require 'View/teacher.php';
    }

}