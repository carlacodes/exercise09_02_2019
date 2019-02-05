<?php


require_once('databasephp.php');
    //$srch_term = $_GET['srch-term'] ?? '1'; //PHP 7.0
    $srch_term = $_POST['srch-term'] ?? '1'; //dataphp 7.0
    $query = "SELECT * FROM film ";
    $query .= "WHERE title = '" . $srch_term."'";

    $connection = connectToDb();

    $result = msysqli_query($connection, $query);

    if (!$result){
        exit("databasePhp query failed.");
    }

    $user = mysqli_fetch_assoc($result);
    ?>
    <table class="table">
        <tr>
            <th>titles</th>

        </tr>

        <?php while ($user = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $user['title'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <?php
    // Free the results from memory
    mysqli_free_result($result);

    // Close the connection
    closeDb($connection);


?>