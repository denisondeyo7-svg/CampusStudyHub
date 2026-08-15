<?php
include("../connection.php");

$id=$_GET['id'];

$select_all= "SELECT * FROM news where id='$id'";

$results= mysqli_query($connection, $select_all);

if($results && mysqli_num_rows($results)>0){

    $row= mysqli_fetch_assoc($results);

    $agenda=$row['agenda'];
}else{
    echo"No data found";
}



$success = "";

$id=$_GET['id'];

if(isset($_POST['updatebtn'])){

    

    $agenda= $_POST['agenda'];

    $edit ="UPDATE news SET agenda ='$agenda' where id='$id'";

    $results2 =mysqli_query($connection,$edit);

    if($results){
        $success = " <div style='text-align: center;color: rgb(11, 155, 27);'> News updated succesfully
           </div>";
    }
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_news</title>
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <form action="" method="post">
        <h3>Edit News</h3>
        

        <?php 
            if(!empty($success)){
                echo $success;

        }
        ?>
        <div class="input">
            <textarea name="agenda" required><?php echo $agenda; ?></textarea>
        </div>
        <button id="add_news_btn"name="updatebtn">Save changes <i class="fas fa-paper-plane"></i></button>
    </form>
</body>
</html>