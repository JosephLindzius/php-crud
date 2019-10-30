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

    public function getFromTable ($pdo, $table)
    {
        $sql = "SELECT * FROM " . $table;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


}


function classroom () {

    $id = "";
    $name = "BrusselNew";
    $location = "Waterloo";
    $newClass = new Classroom($name, $location);
    $sql = "INSERT INTO crud.classroom ('id', 'name', 'location') VALUE (:id, :name, :location)";
    $connect = new Connect();
    $pdo = $connect->openConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':location', $location);
    var_dump($stmt);
    $stmt->execute();
}
