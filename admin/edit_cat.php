<?php
include("../connection.php");

$select ="SELECT * FROM cats";

$results = mysqli_query($connection,$select);

if($results && mysqli_num_rows($results)>0){
    $row= mysqli_fetch_assoc($results);
}

$id = $_GET['id'];

if(isset($_POST['editpdf-btn'])){

    $year = $_POST['year'];

    $semister = $_POST['semister'];
   
    $description = $_POST['description'];
    $pdf = $_FILES['pdf']['name'];

    $tmp =$_FILES['pdf']['tmp_name'];

    $folder ="../pdfs/".$pdf;

    move_uploaded_file($tmp, $folder);

    $update= "UPDATE cats SET year = '$year', semister = '$semister',pdf= '$pdf', description = '$description'
            where id ='$id'";     
                

    $update1= mysqli_query($connection , $update);

    if($update1){
        
        header("Location: assessments.php");
        exit();

    }
    else{
        echo"Something went wrong ";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_pdf</title>
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../admin/admin.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <p class="den">Assessments Tests <i class="fas fa-layer-group"></i></p>
        <div class="input">
            <input type="number"name="year"placeholder="year" value="<?php echo $row['year'];?>"required>
        </div>
        <div class="input">
            <input type="number"name="semister"placeholder="semister"value="<?php echo $row['semister'];?>"required>
        </div>
        <div class="input">
            <input type="file"name="pdf" value="<?php echo $row['pdf'];?> "required>
        </div>
        <div class="input">
            <input type="text"name="description" placeholder="description"value="<?php echo $row['description'];?> "required>
        </div>
        <button id="editbtn"name="editpdf-btn">Commit Changes</button>
    </form>
</body>
</html>