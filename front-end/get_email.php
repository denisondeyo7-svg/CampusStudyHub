<?php 
include("../connection.php"); 

// Load Composer's autoloader
require 'vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 

function send_password_reset($get_username, $get_email, $token) { 
    $mail = new PHPMailer(true); 
    try { 
        // Server settings 
        $mail->SMTPDebug = SMTP::DEBUG_OFF; 
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'denisondeyo7@gmail.com';
        $mail->Password   = 'xwtx gcgz xotg oczy';     
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465; 

        // Recipients 
        $mail->setFrom('denisondeyo7@gmail.com', 'Campus Study Hub');
        $mail->addAddress($get_email, $get_username); 

        // Reset Link
        $reset_link = "http://localhost/campus_study_hub/front-end/reset-password.php?token=" . $token . "&email=" . urlencode($get_email); 

        // Content 
        $mail->isHTML(true); 
        $mail->Subject = 'Password Reset Link from Campus Study Hub'; 
        $mail->Body    = "<h3>Hello " . htmlspecialchars($get_username) . ",</h3> 
                          <p>You requested a password reset for your account.</p> 
                          <p>Click the link below to update your password:</p> 
                          <p><a href='$reset_link' style='padding: 10px 15px; background: #1a3e3b; color: #fff; text-decoration: none; border-radius: 5px;'>Reset Password</a></p> 
                          <p>If you did not request this, please ignore this email.</p>"; 

        $mail->send(); 
        return true; 
    } catch (Exception $e) { 
        return false; 
    } 
} 

$error ="";
$success ="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(16)); 
    
    //check the email
    $select =" SELECT* FROM members WHERE email ='$email' ";
    $results =mysqli_query($connection ,$select);

    if($results && mysqli_num_rows($results)> 0){
        $row = mysqli_fetch_assoc($results);
        $get_email= $row['email'];
        $get_username = $row['username'];

        //update token
        $update = "UPDATE members SET reset_token = '$token' where email = '$get_email'";
        $run = mysqli_query($connection,$update);

        if($run){
            if (send_password_reset($get_username, $get_email, $token)){
                
                $success = "<div style='color: #1a3e3b; text-align: center; font-weight: bold;'>A password reset link has been sent to $email.</div>";
            } else {
                $error = "<div style='color: #f00; text-align: center;'>Email server error. Could not send mail.</div>";
            }
        }
        else {
            $error = "<div style='color: #f00; text-align: center;'>Something went wrong when updating the database.</div>";
        }
    }
    else{
       
        $error= "<div style='text-align: center; color: #f00;'>The email address you provided is not found.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
    <div class="form-wrapper">
        <form action="" method="post">
            <h2>Password Reset</h2>
            <?php 
                if(!empty($error)){
                    echo $error;
                } 
                elseif(!empty($success)){
                    echo $success;
                }
            ?>
            <div class="input">
                <i class="fa-regular fa-envelope-open"></i>
                <input type="email" name="email" placeholder="Enter email to sent a reset link " required>
            </div>
           
            <button id="loginbtn" type="submit">Send Password Reset Link</button>
        </form>
    </div>
</body>
</html>
