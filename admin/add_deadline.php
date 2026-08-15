<?php
include("../connection.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $deadline = $_POST['deadline'];

    $insert_into_db="INSERT INTO deadlines (deadline)
                    values('$deadline')";
    $result =mysqli_query($connection,$insert_into_db);

    if($result){
        echo" <div style='box-shadow: 2px 2px 10px #666;background: #fff;padding:15px;text-align: center;color: #1a2e;'> Deadline added succesfully
           </div><br>
           <a href='deadlines.php'><button style='border:none;background: #1a2e;padding:15px;text-align: center;color: #eee;''>View </button></a>
           ";
    }
    else{
        echo"Something went wrong...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_deadline</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <form action="" method="post">
        <p>Add Deadline</p>
        <div class="input">
            <textarea name="deadline" placeholder="Add deadline.."></textarea>
        </div>
        <button id='adddeadlinebtn'>Add Deadline</button>
    </form>
</body>
</html>