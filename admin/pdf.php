<?php

include("../connection.php");

if(isset($_POST['addpdf-btn'])){
    $year = $_POST['year'];
    $semister = $_POST['semister'];
    $description= $_POST['description'];
    $pdf = $_FILES['pdf']['name'];

    $tmp= $_FILES['pdf']['tmp_name'];

    $folder="../pdfs/".$pdf;

    move_uploaded_file($tmp, $folder);

    $add_to_pdf = "INSERT INTO past_papers (year,semister,pdf,description)
            values('$year','$semister','$pdf','$description')";

    $results = mysqli_query($connection, $add_to_pdf);

    if($results){
        
        header("location: past_papers.php");
        exit();

    }else{
        echo"Failed,please try again later";
        exit();
    }



}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_pdf</title>
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../admin/admin.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <p class="den">Revision Pdfs <i class="fas fa-layer-group"></i></p>
        <div class="input">
            <input type="number"name="year"placeholder="year"required>
        </div>

        <div class="input">
            <input type="number"name="semister"placeholder="semister"required>
        </div>
        
        <div class="input">
            <input type="file"name="pdf"required>
        </div>
        <div class="input">
            <input type="text"name="description" placeholder="description"required>
        </div>
        <button id="editbtn"name="addpdf-btn">Add PDF</button>
    </form>
</body>
</html>