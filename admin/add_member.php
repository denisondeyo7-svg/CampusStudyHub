<?php
include("../connection.php");

if(isset($_POST['regbtn'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    $email =$_POST['email'];

    $select =" SELECT * FROM members where username ='$username' ";

    $results =mysqli_query($connection ,$select);

    if($results && $results->num_rows > 0){
        
        $error ="<div style='background: #fff;padding:12px;text-align: center;
                    color: #f40;font-family: Segoe UI;box-shadow: 2px 2px 21px #555;'>
                    This username is already registered 
                    
                </div><br>";

        echo $error;
       
        echo"<div> 
                <button onclick='history.back()'style='background: #f40;padding:12px;color: #fff;
                    border: none;font-family: Segoe UI;'>
                    back to registration
                </button>
             </div>";

        
        exit();
        
    }

    $select =" SELECT * FROM members where email ='$email' ";

    $results =mysqli_query($connection ,$select);

    if($results && $results->num_rows > 0){
        
        $error ="<div style='background: #fff;padding:12px;text-align: center;
                    color: #f40;font-family: Segoe UI;box-shadow: 2px 2px 21px #555;'>
                    This email is already registered 
                    
                </div><br>";

        echo $error;
       
        echo"<div> 
                <button onclick='history.back()'style='background: #f40;padding:12px;color: #fff;
                    border: none;font-family: Segoe UI;'>
                    back to registration
                </button>
             </div>";

        
        exit();
        
    }

    
    else{
        $insert = "INSERT INTO members (username,password,email)
                    VALUES('$username','$password','$email')";

        $results = mysqli_query($connection , $insert);

        if($results){
            header("location: members.php");
            
            exit();
        }
        else{
            echo"Failed, please try again later!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register </title>
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <form action="" method="post">
        <p>Add member</p>
        <div class="input">
            <input type="text" name="username" placeholder="Enter Username" required>
        </div>

        <div class="input">
            <input type="password" name="password"placeholder="Enter Password" required>
           
        </div>

        <div class="input">
            <input type="email" name="email" placeholder="example@gmail.com" required>
        </div>


        <button type="submit" name="regbtn" id="add_btn">Add member  <i class="fas fa-user-plus"></i></button>
    </form>

</body>

</html>
