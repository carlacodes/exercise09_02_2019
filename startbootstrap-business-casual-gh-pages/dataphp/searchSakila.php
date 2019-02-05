<?php

require_once('databasephp.php');
    //$srch_term = $_GET['srch-term'] ?? '1'; //PHP 7.0
    $srch= $_GET['srch-term'] ?? '1'; //dataphp 7.0
    echo "$srch";
    $query = "SELECT * FROM film WHERE title = '" . $srch."'";

    $connection = connectToDb();
//search database
//check if the variable has not been initalized
    $result = mysqli_query($connection, $query);
    if (empty($result)){
        exit("databasePhp query failed, the result does not exist.");

    }

    $user = mysqli_fetch_assoc($result);
    if (empty($user)){
    exit("database Php query failed, result does not exist.");

    }

//testing
    echo "Successful Search!";

// Free the results from memory
mysqli_free_result($result);

// Close the connection
mysqli_close($connection);

?>
    <table class="table" >
        <tr>
            <th>titles</th>

        </tr>
            <tr>
                <td><?php echo $user['title'] ?></td>
            </tr>

        <tr>
            <th>Film Descriptions</th>
        </tr>
        <tr>
            <td><?php echo $user['description'] ?></td>
        </tr>

        <tr>
            <th>Year of Release</th>
        </tr>
        <tr>
            <td><?php echo $user['release_year'] ?></td>
        </tr>

        <tr>
            <th>Rental Length</th>
        </tr>
        <tr>
            <td><?php echo $user['rental_duration'] ?></td>
        </tr>

        <tr>
            <th>Rental Rate</th>
        </tr>
        <tr>
            <td><?php echo $user['rental_rate'] ?></td>
        </tr>

        <tr>
            <th>Length of Film</th>
        </tr>
        <tr>
            <td><?php echo $user['length'] ?></td>
        </tr>

        <tr>
            <th>Special Features (if any)</th>
        </tr>
        <tr>
            <td><?php echo $user['special_features'] ?></td>
        </tr>
        <tr>
            <th>Parental Guidance Rating</th>
        </tr>
        <tr>
            <td><?php echo $user['rating'] ?></td>
        </tr>


    </table>








