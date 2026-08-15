<?php

include("../connection.php");

$id= $_GET['id'];

$delete_pdf ="DELETE FROM cats where id='$id'";

$result =mysqli_query($connection , $delete_pdf);

if($result){
    header("Location: assessments.php");
    exit();
}
else{
    echo"Failed ! please try again later";
    exit();
}

?>