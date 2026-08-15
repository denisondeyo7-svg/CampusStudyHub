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
        
        $error="<div style='color: #f40;'>
                    $email,This email is already registered 
                </div>";
    }

    elseif($password1 != $password2){
        $error="<div style='color: #f40;'>
                    $username, Your password and your confirm password don't match !
                    
                </div>";
        
        
    }
    
    else{
        $insert = "INSERT INTO members (username,password,email)
                    VALUES('$username','$hashed_password','$email')";

        $results = mysqli_query($connection , $insert);

        if($results){
            header("location: success.html");
            
            exit();
        }
        else{
            echo"Failed, please try again later!";
        }
    }
}



/*
ALTER TABLE members ADD verification_token VARCHAR(255) NULL;
ALTER TABLE members ADD is_verified TINYINT(1) DEFAULT 0;

// ... standard registration database insertion logic ...
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Remember to use password_hash() in production!
    
    // 1. Generate the unique verification token
    $verification_token = bin2hex(random_bytes(16));

    // 2. Insert into database with is_verified = 0
    $insert = "INSERT INTO members (username, email, password, verification_token, is_verified) 
               VALUES ('$username', '$email', '$password', '$verification_token', 0)";
    
    $run = mysqli_query($connection, $insert);

    if ($run) {
        // 3. Send the verification email using your PHPMailer function
        // The link points to verify-email.php instead of reset-password.php
        $verify_link = "http://localhost/campus_study_hub/front-end/verify-email.php?token=" . $verification_token . "&email=" . urlencode($email);
        
        // (Insert your PHPMailer logic here sending $verify_link to the user)
        echo "Registration successful! Please check your email to verify your account.";
    }
}

<?php
include("../connection.php");

$message = "";

if (isset($_GET['token']) && isset($_GET['email'])) {
    $token = $_GET['token'];
    $email = $_GET['email'];

    // 1. Check if a member exists with this exact email and token combination
    $select = "SELECT * FROM members WHERE email = '$email' AND verification_token = '$token' LIMIT 1";
    $result = mysqli_query($connection, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if ($row['is_verified'] == 1) {
            $message = "<div style='color: #1a3e3b;'>Your email is already verified. You can log in.</div>";
        } else {
            // 2. Update status to verified (1) and clear out the token so it cannot be used again
            $update = "UPDATE members SET is_verified = 1, verification_token = NULL WHERE email = '$email'";
            $run = mysqli_query($connection, $update);

            if ($run) {
                $message = "<div style='color: #1a3e3b;'>Account successfully verified! You can now log in.</div>";
            } else {
                $message = "<div style='color: #f00;'>Database error. Failed to update verification status.</div>";
            }
        }
    } else {
        $message = "<div style='color: #f00;'>Invalid link or the token has expired.</div>";
    }
} else {
    $message = "<div style='color: #f00;'>No token or email provided. Request an activation link.</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="form-wrapper" style="text-align: center;">
        <h2>Email Verification</h2>
        <?php echo $message; ?>
        <br>
        <p><a href="login.php" style="color: #1a3e3b; text-decoration: underline;">Go to Login Page</a></p>
    </div>
</body>
</html>

// Inside your login processing block:
$select = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connection, $select);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // Check if the verified column is 1
    if ($user['is_verified'] == 0) {
        $error = "Please check your inbox and verify your email address before logging in.";
    } else {
        // Proceed with starting the user session and logging them in
    }
}




*/
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
    <div class="form-wrapper">
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