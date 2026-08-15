<?php

include("../connection.php");

$my_id = $_GET['id'];

$delete_item ="DELETE FROM deadlines where id ='$my_id'";

$results =mysqli_query($connection, $delete_item);

if ($results){
    header("Location: deadlines.php");
}
else{
    echo"Something went wrong..try again!";
}


?>