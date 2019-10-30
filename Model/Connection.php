<?php
//require 'Student.php';
function whatIsHappening()
{

    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
    //echo '<h2>$_SERVER</h2>';
    //var_dump($_SERVER);

}

function openConnection()
{
    // Try to figure out what these should be for you
    $dbhost = "localhost";
    $dbuser = "joseph";
    $dbpass = "adminPass";
    $db = "crud";

// Try to understand what happens here

    return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db , $dbuser , $dbpass);

}


/* Fetch all of the remaining rows in the result set */

$pdo = openConnection();
var_dump($pdo);
$sql = "SELECT * FROM crud.student";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

function getFromTable ($table)
{
    $pdo = openConnection();
    var_dump($pdo);
    $sql = "SELECT * FROM crud." . $table;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
var_dump(getFromTable("classroom"));
//var_dump($data);
$students = [];
foreach ($data as $student) {
// var_dump($student['name']);
   //$person = new Student($student['id'], $student['name'], $student['email'], $student['class']);
   //var_dump($person);
  // array_push($students,$person);
}
var_dump($students);

function selectWHere(PDO $pdo, string $query, string $column, string $value): array
{
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':' . $column, $value);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


$sql = "SELECT name FROM crud.student WHERE class = :class";
var_dump(selectWHere($pdo, $sql, 'class', "1"));

