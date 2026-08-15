<?php

include("../connection.php");

$id= $_GET['id'];

$delete_pdf ="DELETE FROM messages where id='$id'";

$result =mysqli_query($connection , $delete_pdf);

if($result){
    header("Location: messages.php");
    exit();
}
else{
    echo"Failed ! please try again later";
    exit();
}

?>