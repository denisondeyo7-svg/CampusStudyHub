<?php
include("../connection.php");

$id = $_GET['id'];

$update = "SELECT * FROM notes where id ='$id'";

$results = mysqli_query($connection , $update);

if($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);
}
else{
    echo"No data found";
}


$id = $_GET['id'];

if(isset($_POST['editnotes-btn'])){

    $year = $_POST['year'];
    $semister = $_POST['semister'];
    $description = $_POST['description'];
    $pdf = $_FILES['pdf']['name'];

    $tmp =$_FILES['pdf']['tmp_name'];

    $folder ="../Notes/".$pdf;

    move_uploaded_file($tmp, $folder);

    $update= "UPDATE notes SET year = '$year', semister = '$semister',
               pdf= '$pdf', description = '$description' where id ='$id'";     
                

    $update1= mysqli_query($connection , $update);

    if($update1){
        
        header("Location: notes_page.php");
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
    <title>Add_notes</title>
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../admin/admin.css">
</head>
<body>
    <form action="edit_notes.php?id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
        <p class="den">Add Notes <i class="fas fa-graduation-cap"></i></p>
        <div class="input">
            <input type="number"name="year"placeholder="year"value="<?php echo $row['year'];?>">
        </div>
        <div class="input">
            <input type="number"name="semister"placeholder="semister"value="<?php echo $row['semister'];?>">
        </div>
        <div class="input">
            <input type="file"name="pdf"value="<?php echo $row['pdf'];?>">
        </div>
        <div class="input">
            <input type="text"name="description" placeholder="description"value="<?php echo $row['description'];?>">
        </div>
        <button id="editbtn"name="editnotes-btn">Commit Changes</button>
    </form>
</body>
</html>