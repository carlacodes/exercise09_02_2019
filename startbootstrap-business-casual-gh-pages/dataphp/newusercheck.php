<?php

//making this a function

require_once('databasephp.php');

//ALTER THE TABLE DEFAULT VALUES FOR ALL THE REQUIRED COLUMNS 05/02/2019
mysqli_query($link,"ALTER TABLE customer
ALTER COLUMN store_id SET DEFAULT NULL,
ALTER COLUMN address_id SET DEFAULT NULL,
ALTER COLUMN active SET DEFAULT '1',
ALTER COLUMN create_date SET DEFAULT CURRENT_TIMESTAMP
))");

$firstName = $_POST['firstname'] ?? '1'; //dataphp 7.0
$familyName = $_POST['lastname'] ?? '1';
$emailSql=$_POST['email'] ?? '1'; //want to retrieve email

$qryAdd = "INSERT INTO customer (first_name, last_name, email) VALUES (";
$qryAdd .= "'" . $firstName . "', '" . $familyName . "', '" . $emailSql . "')";

$qryFind = "SELECT * FROM customer ";
$qryFind .= "WHERE first_name= '" . $firstName . "' AND last_name = '" . $familyName ."' AND email = '" . $emailSql . "'";

    $connection = connectToDb();

//Check if the name exists
    $result = mysqli_query($connection, $qryFind);
    if (mysqli_num_rows($result) > 0) {
        echo "You are Logged In";
    } else {
        $result = mysqli_query($connection, $qryAdd);
        // check the query worked
        if ($result) {
            echo "Success, your account has been registered";
            closeDb($connection);
        } else {
            echo mysqli_error($connection);
            closeDb($connection);
            exit;
        }
    }