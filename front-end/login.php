<?php
session_start();
include("../connection.php");


$error ="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username= $_POST['username'];
    $password= $_POST['password'];
    

    $select =" SELECT* FROM members WHERE username ='$username' ";

    $results =mysqli_query($connection ,$select);

    
    if($results && $results->num_rows > 0){
        $row = $results->fetch_assoc();

        

        if(password_verify($password, $row['password'])){
            $_SESSION['username']= $username;
            $_SESSION['role']= $row['role'];
            $_SESSION['status']=$row['status'];

            
            $update="UPDATE members SET status='Online' where username ='$username' ";

            $results = mysqli_query($connection, $update);
            if($_SESSION['role']){
                if($row['role']=='Admin'){
                    header("Location: ../admin/index.php");
                    exit();
                }
                else{
                    header("Location: ../dashboard.php");
                    exit();
                }
            }else{
                header("Location: login.html");
                exit();
            }
        }
        else{
            $error= "<div style='color: #f40;'>
                    You entered a Wrong password
                     </div>";

            
        }
    }
    else{
        $error= "<div style='color: #f40;'>
                     This username is not found.
                     </div>";
        
    }
        
}
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>

<body>
    <div class="form-wrapper">
        <form action="" method="post">
            <h2>Login here</h2>
            <?php 
                if(!empty($error)){
                    echo $error;
                } 
            ?>
            <div class="input">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="username" placeholder="Enter Username" required>
            </div>

            <div class="input">
                <i class="fas fa-lock-open"></i>
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
                <div class="log" id="toggle">
                    Show
                    
                </div>
            </div>
            <div class="links">
                <p>Don't have an account yet?<a href="register.php">    Register</a></p>
            </div>
            <button id="loginbtn">Login</button>
            
        </form>
        <div class="links">
            <p><a href="get_email.php">Forgot  Password?</a></p>
        </div>
    </div>
    <script>
        password = document.getElementById('password');
        toggle = document.getElementById('toggle');

        toggle.addEventListener('click', () => {
            if (password.type === "password" && toggle.textContent === "Show") {
                password.type = "text";
                toggle.textContent = "Hide";
            }
            else {
                password.type = "password";
                toggle.textContent = "Show";
            }
        });    
    </script>

</body>

</html>