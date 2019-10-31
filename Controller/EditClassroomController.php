<?php


class EditClassroomController
{

    public function render($table, $id)
    {
        //require 'Model/Connect.php';
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $data = $connect->getFromTableById($pdo, $table, $id);




        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/editClassroom.php';
    }
}