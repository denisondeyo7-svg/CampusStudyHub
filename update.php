<?php
session_start();
include("connection.php");

$username =$_SESSION['username'];

$select ="SELECT * FROM members where username ='$username' ";

$results =mysqli_query($connection ,$select);

$results -> num_rows> 0;
$row = $results->fetch_assoc();

$username =$_SESSION['username'];

if(isset($_POST['updatebtn'])){

    $newusername =$_POST['username'];
    $password =$_POST['password'];
    $email =$_POST['email'];

    $oldusername = $_SESSION['username'];

    $edit ="UPDATE members  set username = '$newusername',
            password= '$password', email='$email'
             
            where username='$username'";

    $run =mysqli_query($connection, $edit);

    if($run){
        header("location: dashboard.php");
        exit();
    }
    else{
        echo"<script> alert('Failed to update..') ;</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User account </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-wrapper">
            <form action="update.php" method="post">
            <h2>Update User Account</h2>
            <div class="input">
                <input type="text" name="username" value="<?php echo $row['username'];?>">
            </div>

            <div class="input">
                <input type="password" name="password" id="password" value="<?php echo $row['password'];?>">
                <span class="update"id="update">Show</span>
            </div>

            <div class="input">
                <input type="email" name="email" value="<?php echo $row['email'];?>">
            </div>

            <button type="submit" name="updatebtn" id="updatebtn">Save Changes</button>
        </form>
    </div>


    <script>
        password = document.getElementById('password');
        update = document.getElementById('update');

        update.addEventListener('click', () => {
            if (password.type === "password" && update.textContent === "Show") {
                password.type = "text";
                update.textContent = "Hide";
            }
            else {
                password.type = "password";
                update.textContent = "Show";
            }
        });


    </script>
</body>

</html>