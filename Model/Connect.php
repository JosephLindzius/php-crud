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

    public function getPeopleByClassId (PDO $pdo, $table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE class = :id ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getIndividual (PDO $pdo, $table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id = :id ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        $data = $stmt->fetch();
        return $data;
    }

    public function getFromTableById (PDO $pdo, $table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id = :id ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        $data = $stmt->fetch();
        return $data;
    }

    public function getClassroomName (PDO $pdo, $id) {
        $sql = 'SELECT name FROM classroom WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
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

    public function updateStudent (PDO $pdo, $id, $name, $email, $class) {

        $sql = "UPDATE student
                SET name = :name, email = :email, class = :class
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            'id' => $id,
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

    public function updateTeacher (PDO $pdo, $id, $name, $email, $class) {

        $sql = "UPDATE teacher
                SET name = :name, email = :email, class = :class
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            'id' => $id,
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
    public function updateClassroom (PDO $pdo, $id, $name, $location) {

        $sql = "UPDATE classroom
                SET name = :name, location = :location
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([
            'id' => $id,
            'name' => $name,
            'location' => $location
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

    public function createTable (PDO $pdo, $table) {
        $sql = "create table crud.". $table ."
                (
                    id    int auto_increment
                        primary key,
                    name  varchar(255) not null,
                    email varchar(255) null,
                    class int          not null,
                    constraint student_classroom_id_fk
                        foreign key (class) references crud.classroom (id)
                );";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }



}


