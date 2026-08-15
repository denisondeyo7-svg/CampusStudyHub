<?php

include("../connection.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
  

    $agenda= $_POST['agenda'];
    
    $image= $_FILES['image']['name'];

    $tmp = $_FILES['image']['tmp_name'];

    $folder = "../imagenews/".$image;

    move_uploaded_file($tmp ,$folder);




    $add_in_db ="INSERT INTO news (image,agenda)
                 values ('$image','$agenda')";

    $results = mysqli_query($connection , $add_in_db);

    if($results){
        header("Location: news_management.php");
        exit();
    }
    else{
        echo"Something went wrong...";
        exit();
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_news</title>
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>News</h3>
        

        <div class="input">
            <input type="file"name="image">
        </div>

        <div class="input">
            <textarea name="agenda"placeholder="Write something..."required></textarea>
        </div>
        <button id="add_news_btn">Add to News <i class="fas fa-paper-plane"></i></button>
    </form>
</body>
</html>