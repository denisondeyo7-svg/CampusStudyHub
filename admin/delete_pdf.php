<?php
include("../connection.php");

$id= $_GET['id'];

$delete_pdf ="DELETE FROM past_papers where id='$id'";

$result =mysqli_query($connection , $delete_pdf);

if($result){
    header("Location: past_papers.php");
    exit();
}
else{
    echo"Failed ! please try again later";
    exit();
}

?>