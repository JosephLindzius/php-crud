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
        // Try to figure out what these should be for you
        $dbhost = "localhost";
        $dbuser = "joseph";
        $dbpass = "adminPass";
        $db = "crud";

// Try to understand what happens here

        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db , $dbuser , $dbpass);

    }

    public function getFromTable ($pdo, $table)
    {
        $sql = "SELECT * FROM crud." . $table;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }



}