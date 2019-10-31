<?php

class IndividualController
{

    public function render($table, $post)
    {
        // these 2 lines need to be removed after link with real variables($table, $post)
        $table = "student";
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
        } else {
            $status = "teacher";
            $user = new Teacher($person['id'], $person['name'], $person['email'], $person['class']);
        };

        $classroom = $connect ->getClassroomName($pdo, $user->getId());
        //var_dump($classroom);

        //load the view
        require 'View/individual.php';
    }

}


