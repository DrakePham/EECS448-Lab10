<?php
error_reporting(E_ALL);
ini_set("display_error", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "m846p339", "raY9uC7m", "m846p339");

/* checking connection */
if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

$user = $_POST['user'];
$query = "SELECT * FROM Posts WHERE author_id = '" . $user ."'";



if ($result = $mysqli->query($query)) {
   
   echo'<h1> Posts from '. $user. ': </h1>';

   echo'<table border="3">';

   echo'<tr>';
   echo'<th> Post ID </th>';
   echo'<th> Content </th>';
   echo'</tr>';
/* fetch associative array */
   while ($row = $result->fetch_assoc()) {
      echo'<tr>';
      echo'<td>' .$row["post_id"].'</td>';
      echo' <td>' .$row['content'].'</td>';
      echo'</tr>';
   }
   /* free result set */
   $result->free();


}
 $mysqli->close();

?>