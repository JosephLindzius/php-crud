<?php
require './Model/Connect.php';

class StudentController
{

    public function getTeacherByClassId () {
        $data = new Connect();
        $pdo = $data->openConnection();
        $sql = "SELECT name FROM crud.teacher WHERE class = :class";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['class' => "1"]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getWhateverYouWant ($query) {
        $data = new Connect();
        $pdo = $data->openConnection();
        $sql = $query;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}

