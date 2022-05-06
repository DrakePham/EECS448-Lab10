<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "m846p339", "raY9uC7m", "m846p339");

if ($mysqli->connect_errno) 
{
    printf("Connect failed: %s\n", $mysqli->connect_error); 
    exit();
}

$checkedboxes = $_POST["checked"];

echo'Post_id Deleted :';

for($i=0; $i<count($checkedboxes); $i++)
{
    echo $checkedboxes[$i];
}

for($j=0; $j<count($checkedboxes); $j++)
{
    $delete = "DELETE FROM Posts WHERE post_id=$checkedboxes[$j]";
    $mysqli->query($delete);
}



$mysqli->close();
?>