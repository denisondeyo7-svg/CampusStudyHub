<?php

include("../connection.php");

$id=$_GET['id'];

$select ="SELECT * FROM members where id='$id'";

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
    <title>User profile</title>
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="main-profile">
        <div class="profile-card">
            <p style="font-weight: 500;font-size: 18px;text-align:
            center;">User Profile card</p>
            
            <div class="imagedp">
                <img src="../1774128504685.png" alt="">
            </div>
            <div class="username">
                <p><strong>Username: </strong><?php echo $row['username'];?></p>
            </div>
            
            <div class="email">
                <p><strong>Email: </strong><?php echo $row['email'];?></p>
            </div>

            <div class="btns">
                <button onclick="history.back()" id="backbtn"><i class="fas fa-undo"></i>  Close</button>

            </div>
            
        </div>
    </div>



</body>

</html>