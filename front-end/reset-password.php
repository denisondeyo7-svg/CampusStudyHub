<?php

include("../connection.php");


$error="";
$success = "";


if(isset($_POST['changepass'])){

    $email = $_POST['email'];
    $newpassword = $_POST['newpassword'];
    $conpassword = $_POST['conpassword'];

    $token = $_POST['pass_token'];



    if(!empty($token)){

        if(!empty($token) && !empty($newpassword) && !empty($conpassword)){

            //checking the token if valid

            $select_token = "SELECT reset_token FROM members where reset_token = '$token' limit 1";

            $token_run = mysqli_query($connection , $select_token);

            if($token_run && mysqli_num_rows($token_run)>0){

                //update the password
                if($newpassword == $conpassword){

                    $update = "UPDATE members SET password = '$newpassword' where reset_token = '$token' limit 1";

                    $pass_run = mysqli_query($connection, $update);

                    if($pass_run){

                        //update the token
                        $new_token =md5(rand());

                        $update_token = "UPDATE members SET reset_token = '$new_token' where reset_token = '$token' limit 1";

                        $token_run = mysqli_query($connection, $update_token);

                        $success = "<div style ='color: #1a4e;'>Your new password has been updated successfully </div>";

                    }
                    else{
                        $error ="<div style='color: #f00f;text-align: center;'>Password did not update ,something went wrong  </div>";

                    }
                }
                else{
                    $error ="<div style='color: #f00f;text-align: center;'>Your new password do not match with the confirm password </div>";
                }

            }else{
                $error="<div style='color: #f00f;text-align: center;'>This token is invalid. </div>";
            }
        }
    }
    else{
        $error="<div style='color: #f00f;text-align: center;'>This token is not available </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="form-wrapper">
        <form action="" method="post">
            <h2>Password Reset</h2>
            <?php
                if (!empty($success)) {
                    echo $success;
                } elseif (!empty($error)) {
                    echo $error;
                }
            ?>
            <input type="hidden" name="pass_token" value="<?php echo isset($_GET['token']) ? $_GET['token'] : (isset($_POST['pass_token']) ? $_POST['pass_token'] : ''); ?>">

            
            <div class="input">
                <input type="email" name="email" placeholder="example@gmail.com"value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" required>
            </div>
            <div class="input">
                <input type="password" name="newpassword" placeholder="Create a new password" required>
            </div>

            <div class="input">
                <input type="password" name="conpassword" placeholder="Confirm my new password" required>
            </div>

            <button name="changepass" type="submit" id="loginbtn">Update Password</button>
        </form>
    </div>
</body>
</html>