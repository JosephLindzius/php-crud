<?php

class classroomDetailController
{

    public function render($post)
    {
        // these 2 lines need to be removed after link with real variables($table, $post)
        $post = 1;

        // get connection to the database
        require 'Model/Connect.php';
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $dataClass = $connect->getClassroom($pdo, $post);
//        var_dump($dataClass);
        $class = new Classroom($post, $dataClass['name'], $dataClass['location']);
//        var_dump($class);

        $assignedTeachers= $connect->getPeopleByClassId($pdo, "teacher", $class->getId());
        //            var_dump($assignedTeachers);
        $teachers = [];
        foreach ($assignedTeachers as $teacher) {
            $person = new Teacher($teacher['id'], $teacher['name'], $teacher['email'], $teacher['class']);
            array_push($teachers,$person);
        }
//        var_dump($teachers);

        $assignedStudents= $connect->getPeopleByClassId($pdo, "student", $class->getId());
//        var_dump($assignedStudents);
        //            var_dump($assignedTeachers);
        $students = [];
        foreach ($assignedStudents as $student) {
            $person = new Teacher($student['id'], $student['name'], $student['email'], $student['class']);
            array_push($students,$person);
        }
//        var_dump($students);

        //load the view
        require 'View/classroomDetail.php';
    }

}


