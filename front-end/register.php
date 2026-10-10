<?php
include("../connection.php");


$error ="";

if(isset($_POST['regbtn'])){
    $username =$_POST['username'];
    $password1 =$_POST['password1'];
    $password2 =$_POST['password2'];
    $email =$_POST['email'];

    $hashed_password = password_hash($password1 ,PASSWORD_DEFAULT);

    
    $select =" SELECT * FROM members where email ='$email' ";

    $results2 =mysqli_query($connection ,$select);

    if($results2 && mysqli_num_rows($results2)>0){
        
        $error="<div style='color: #f00f;'>
                    $email, is already registered 
                </div>";
    }
   

    else{ 
        if(strlen($password1)<8){
          $error="<div style='color: #f00f;'>
                    Password must be atleast 8 characters!
                    
                </div>";
        }
        
        elseif($password1 != $password2){
                $error="<div style='color: #f00f;'>
                        Your confirm password did not match 
                        
                    </div>";
                }

        else{
            $insert = "INSERT INTO members (username,password,email)
                VALUES('$username','$hashed_password','$email')";

            $results = mysqli_query($connection , $insert);

            if($results){
                header("Location: success.html");
                
                exit();
            }
            else{
                $error="<div style='color: #f00f;'>
                        Please try again later 
                        
                    </div>";

            }
                
            
            
        }
    

        
    }
}

?>

    



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>

<body>
    <div class="form-container">
        <div class="form-wrapper">
            <div class="form-img">
                <img src="../1774128504685.png" alt="">
            </div>
            <form action="" method="post">
            <h2>Register here</h2>

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
                <i class="fas fa-lock"></i>
                <input type="password" name="password1" id="password" placeholder="Enter Password" required>
                <div class="reg" id="toggle"> Show</div>
            </div>

            <div class="input">
                <i class="fas fa-key"></i>
                <input type="password" name="password2" id="password" placeholder="Confirm Password" required>
                
            </div>

            <div class="input">
                <i class="fa-regular fa-envelope-open"></i>
                <input type="email" name="email" placeholder="example@gmail.com" required>
            </div>

            <div class="links">
                <p>Already have an account? <a href="login.php">Login</a>
                <p>
            </div>

            <button type="submit" name="regbtn" id="registerbtn">Register <i class="fas fa-database"></i></button>
        </form>
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