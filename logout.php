<?php

include("connection.php");

session_start();
$username=$_SESSION['username'];

$update="UPDATE members SET status='Offline' where username ='$username' ";

$results = mysqli_query($connection, $update);
session_unset();



session_destroy();

header("Location: front-end/login.php");

?>