<?php

include("../connection.php");

$my_id = $_GET['id'];

$select_all= "SELECT * FROM deadlines where id ='$my_id'";

$results =mysqli_query($connection,$select_all);

mysqli_num_rows($results)>0;

$row = mysqli_fetch_assoc($results);

$my_id = $_GET['id'];

if(isset($_POST['savechangesbtn'])){

    $deadline = $_POST['deadline'];

    $update_deadline= "UPDATE deadlines SET deadline = '$deadline' where id='$my_id'";

    $results2=mysqli_query($connection,$update_deadline);

    if($results2){
        header("Location: deadlines.php");
        exit();
    }
    else{
        echo"Something went wrong,Please try again!";
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_deadline</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <form action="" method="post">
        <p>Edit Deadlines</p>
        <div class="input">
           <textarea name="deadline"> <?php echo $row['deadline'];?></textarea>
        </div>
        <button name="savechangesbtn" id="edit_deadline">Save changes</button>
    </form>
</body>
</html>