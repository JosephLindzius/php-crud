<?php


class ClassroomController
{
    public function render()
    {
        require 'Model/Connect.php';
        //this is just example code, you can remove the line below
        $connect = new Connect();
        $pdo = $connect->openConnection();
        $classes = $connect->getFromTable($pdo, 'classroom');

        $allClasses = [];
        foreach ($classes as $class) {
            $person = new Classroom($class['id'], $class['name'], $class['location']);
            array_push($allClasses,$person);
        }

        if(array_key_exists('delete',$_POST)){
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $connect->deleteById($pdo, 'classroom', $_POST['delete']);
            $_POST = [];
            header("Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = "INSERT INTO classroom (name, location) VALUES (:name, :location)";
            $connect = new Connect();
            $pdo = $connect->openConnection();
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([
                'name' => $_POST['name'],
                'location' => $_POST['location']
            ])) {
                echo 'i worked';
            } else {
                echo 'failed';
            };
        }

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/classroom.php';
    }
}