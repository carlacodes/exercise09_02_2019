<?php

function findTerm(){
require_once('databasephp.php');
    //$srch_term = $_GET['srch-term'] ?? '1'; //PHP 7.0
    $srch_term = $_POST['srch-term'] ?? '1'; //dataphp 7.0
    $query = "SELECT * FROM film ";
    $query .= "WHERE title = '" . $srch_term."'";

    $connection = connectToDb();
//search database
    $result = mysqli_query($connection, $query);
    if (!$result){
        exit("databasePhp query failed.");
    }

    $user = mysqli_fetch_assoc($result);


    // Free the results from memory
    mysqli_free_result($result);

    // Close the connection
    mysqli_close($connection);}







