<?php

class IndividualController
{

    public function render($table, $post)
    {
        // these 2 lines need to be removed after link with real variables($table, $post)
        $table = "teacher";
        $post = 1;

        // get connection to the database
        require 'Model/Connect.php';
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $person= $connect->getIndividual($pdo, $table, $post);
        //var_dump($person);


        // make an object depends on the person(student/teacher)
        if ($table == "student"){
            $status = "student";
            $user = new Student($person['id'], $person['name'], $person['email'], $person['class']);
            $assignedTeachers= $connect->getPeopleByClassId($pdo, "teacher", $user->getId());
//            var_dump($assignedTeachers);

            $teachers = [];
            foreach ($assignedTeachers as $teacher) {
                $person = new Teacher($teacher['id'], $teacher['name'], $teacher['email'], $teacher['class']);
                array_push($teachers,$person);
            }
//            var_dump($teachers);

        } else {
            $status = "teacher";
            $user = new Teacher($person['id'], $person['name'], $person['email'], $person['class']);
            $assignedStudents= $connect->getPeopleByClassId($pdo, "student", $user->getId());
//            var_dump($assignedStudents);

            $students = [];
            foreach ($assignedStudents as $student) {
                $person = new Teacher($student['id'], $student['name'], $student['email'], $student['class']);
                array_push($students,$person);
            }
            var_dump($students);
            var_dump($status);
        };








        $classroom = $connect ->getClassroomName($pdo, $user->getId());
        //var_dump($classroom);

        //load the view
        require 'View/individual.php';
    }

}


