<?php

include("../connection.php");

$id = $_GET['id'];

$delete = "DELETE FROM notes WHERE id='$id'";

$results=mysqli_query($connection, $delete);

if($results){
    header("Location: notes_page.php");
    exit();
}


?>