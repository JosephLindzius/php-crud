<?php


class Connect
{
    /**
     * Connect constructor.
     */
    public function __construct()
    {

    }

    public function openConnection()
    {
        require "config.php";
        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db , $dbuser , $dbpass);
    }

    public function getFromTable (PDO $pdo, $table)
    {
        $sql = "SELECT * FROM " . $table;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getClassroomName (PDO $pdo, $id) {
        $sql = 'SELECT name FROM classroom WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function addStudent(PDO $pdo, $name, $email, $class) {
        $sql = "INSERT INTO student (name, email, class) VALUES (:name, :email, :class)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            'name' => $name,
            'email' => $email,
            'class' => $class
        ])) {
            echo 'i worked';
        } else {
            echo 'failed';
        };
        $_POST = [];
    }

    public function addTeacher(PDO $pdo, $name, $email, $class) {
        $sql = "INSERT INTO teacher (name, email, class) VALUES (:name, :email, :class)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            'name' => $name,
            'email' => $email,
            'class' => $class
        ])) {
            echo 'i worked';
        } else {
            echo 'failed';
        };
        $_POST = [];
    }

    public function addClassroom (PDO $pdo, $name, $location) {
        $sql = "INSERT INTO classroom (name, location) VALUES (:name, :location)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            'name' => $name,
            'location' => $location,
        ])) {
            echo 'i worked';
        } else {
            echo 'failed';
        };
        $_POST = [];
    }

    public function deleteById (PDO $pdo, $table ,$id) {
        $sql = 'DELETE FROM '.$table.' WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function deleteTable (PDO $pdo, $table) {
        $sql = 'DROP TABLE '.$table;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }


}


