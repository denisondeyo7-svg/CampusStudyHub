<?php
include("../connection.php");

if(isset($_POST['addnotes-btn'])){
    $year = $_POST['year'];
    $semister = $_POST['semister'];
    $description = $_POST['description'];
    $pdf = $_FILES['pdf']['name'];

    $tmp =$_FILES['pdf']['tmp_name'];

    $folder ="../Notes/".$pdf;

    move_uploaded_file($tmp, $folder);

    $add_to_database ="INSERT INTO notes (year,semister, pdf,description)
                values('$year','$semister','$pdf','$description')";
 
 // run the query command

    $results = mysqli_query($connection , $add_to_database);
    if($results){
        
        header("location: notes_page.php");
        exit();

    }
    else{
        echo"Something went wrong, please try again later.";
        exit();
    }
}

?>