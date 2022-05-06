<?php
error_reporting(E_ALL);
ini_set("display_error", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "m846p339", "raY9uC7m", "m846p339");
    if($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $username = $_POST["username"];
    $content = $_POST["content"];
    
    $insert = "INSERT INTO Users (user_id) VALUES ('$username')";
    $query = "SELECT * FROM Users WHERE user_id = '$username'";
    $insertPost = "INSERT INTO Posts (author_id, content) VALUES ('$username', '$content')";
    
    
    if($result = $mysqli->query($query))
    {
        if($result->num_rows > 0)
        {
            if($content == "")
            {
                echo 'Empty Text';
            }
            else
            {
                if($mysqli->query($insertPost))
                {
                    echo 'Text Added';
                }
            }
            
        }
        else
        {
            echo 'Unvalid User_id';
        }
    }
    $mysqli->close();
?>