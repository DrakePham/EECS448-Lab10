<?php
error_reporting(E_ALL);
ini_set("display_error", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "m846p339", "raY9uC7m", "m846p339");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $usernames = "SELECT * SELECT Users";
    $result = $mysqli->query($usernames);
    echo '<table border="3">';
    echo '<tr><td>User name</td></tr>';

    
    if($result->num_rows > 0)
    {
        /* fetch associative array */
        while($row = $result->fetch_assoc())
        {
            echo '<tr><td>'. $row["user_id"] . '</td></tr>';
        }
        /* free result set */
        $result->free();
    }

    echo'</table>';
    $mysqli->close();
?>