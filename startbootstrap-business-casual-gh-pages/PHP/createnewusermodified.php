<?php

//making this a function
function createNewUser(){
require_once('phpDatabaseConnection.php');

$firstName = $_POST['firstname'] ?? '1'; //PHP 7.0
$familyName = $_POST['lastname'] ?? '1';
$emailSql=$_POST['email'] ?? '1'; //want to retrieve email

$qryAdd = "INSERT INTO Users (firstName, familyName, email) VALUES (";
$qryAdd .= "'" . $firstName . "', '" . $familyName . "', '" . $emailSql . "')";

$qryFind = "SELECT * FROM Users ";
$qryFind .= "WHERE firstName = '" . $firstName . "' AND familyName = '" . $familyName ."' AND emailSql = '" . $emailSql . "'";

    $connection = connectToDb();

//Check if the name exists
    $result = mysqli_query($connection, $qryFind);
    if (mysqli_num_rows($result) > 0) {
        echo "Sorry... your details are already registered";
    } else {
        $result = mysqli_query($connection, $qryAdd);
        // check the query worked
        if ($result) {
            echo "New user created";
            closeDb($connection);
        } else {
            echo mysqli_error($connection);
            closeDb($connection);
            exit;
        }
    }}