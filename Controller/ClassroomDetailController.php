<?php

class classroomDetailController
{

    public function render($post)
    {
        // these 2 lines need to be removed after link with real variables($table, $post)
        $post = 2;

        // get connection to the database
        require 'Model/Connect.php';
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $dataClass = $connect->getClassroom($pdo, $post);
        var_dump($dataClass);


        //var_dump($classroom);

        //load the view
        require 'View/classroomDetail.php';
    }

}


