<?php
session_start();

include("connection.php");

if(!isset($_SESSION['username'])){
    header("Location: front-end/login.html");
    exit();
}
$username=$_SESSION['username'];

$select ="SELECT* FROM members where username ='$username'";

$results =mysqli_query($connection ,$select);

$row =[
    'username'=>'',
    'password'=>'',
    'email'=>''
];
if ($results && $results -> num_rows> 0){
    $row = $results->fetch_assoc();

}
else{
    echo"No data was found";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main-profile">
        <div class="profile-card">
            <p style="font-weight: 500;font-size: 18px;text-align:
            center;">My Profile card</p>
            
            <div class="imagedp">
                <img src="1774128504685.png" alt="">
            </div>
            <div class="username">
                <p><strong>Status: </strong><small><?php echo $row['status'];?> </small></p>
            </div>
            
            <div class="username">
                <p><strong>Username: </strong><?php echo $row['username'];?></p>
            </div>
            
            <div class="email">
                <p><strong>Email: </strong><?php echo $row['email'];?></p>
            </div>

            <div class="btns">
                <button onclick="history.back()" id="backbtn"> <i class="fas fa-undo"></i></button>

                <a href="update.php">
                    <button name="updatebtn" id="updatebtn">Update  <i class="fas fa-pen"></i></button>
                </a>

                
            </div>
            
        </div>
    </div>


</body>

</html>