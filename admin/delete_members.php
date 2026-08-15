<?php
include("../connection.php");

$id =$_GET['id'];
$delete_data ="DELETE from members where id ='$id'";

$result=mysqli_query($connection, $delete_data);

if($result){
    header("Location: members.php");
    exit();
}
else{
    echo"Something went wrong...";
}
?>