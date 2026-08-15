<?php

include("../connection.php");

$my_id = $_GET['id'];

$delete_item ="DELETE FROM news where id ='$my_id'";

$results =mysqli_query($connection, $delete_item);

if ($results){
    header("Location: news_management.php");
}
else{
    echo"Something went wrong..try again!";
}


?>