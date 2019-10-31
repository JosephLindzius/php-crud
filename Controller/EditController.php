<?php


class EditController
{

    public function render($table, $id)
    {
        //require 'Model/Connect.php';
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $data = $connect->getFromTableById($pdo, $table, $id);
        $data = $data[0];



        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/edit.php';
    }
}