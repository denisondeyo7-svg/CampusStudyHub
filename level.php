<?php

include("connection.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $year = $_POST['year'];

    $sql ="INSERT INTO year (year) values ('$year')";

    $results =mysqli_query($connection , $sql);

    // notes redirecting

    if($results && $_POST['year'] ==1){
        header("Location: year_one_notes.php");
        exit();
    }
    elseif ($results && $_POST['year'] ==2) {
        
        header("Location: year_two_notes.php");
        exit();
    }
    elseif ($results && $_POST['year'] ==3) {
        header("Location: year_three_notes.php");
        exit();
    }
    else{
        header("Location: year_four_notes.php");
        exit();
    }

}



?>