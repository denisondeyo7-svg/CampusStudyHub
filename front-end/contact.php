<?php

include("../connection.php");


$message = "";
$error="";
if(isset($_POST['sendbtn'])){

    $name=$_POST['name'];
    $number=$_POST['number'];
    $message=$_POST['message'];
    

    //add to database

    $insert_data ="INSERT INTO messages (name,number,message)
                VALUES('$name','$number','$message')";

    $results=mysqli_query($connection,$insert_data);

    if($results){
        $message = "<div style='color: #079933;'>$name , Your has been delivered successfully </div>";
        
        

    }
    else{
        $error="<div style='color: #f00;'>Something went wrong during message delivery</div>";
        
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>

<body>
    <div class="contact-wrapper">
        <div class="wrapper-contact">
            <div class="contact-card">
                <button style="width: 6rem;margin:12px;" onclick="history.back()" id="backbtn"><i
                        class="fas fa-undo"></i>
                    Back
                </button>
                <div class="more">
                    <div class="name">
                        <p>Have queries? Or want help ! I have the answers, please reach the following
                            platforms.
                            
                        </p>
                    </div>
                    <div class="socials">
                        <a href="tel:+254726534460"><i class="fas fa-phone"
                                style='background: #00f;padding: 10px;border-radius:12px;color: #fff;'></i> Call
                        </a>

                        <a href="https://wa.me/254726534460"><i class="fa-brands fa-whatsapp"
                                style='background: green;padding: 10px;border-radius:12px;color: #fff;'></i> Whatsapp
                        </a>
                        
                        <a href="http://web.facebook.com/amazing.denis.24"><i class="fa-brands fa-facebook"
                                style='background: #00f;padding: 10px;border-radius:12px;color: #fff;'></i> facebook
                        </a>

                        <a href="mailto:denisondeyo7@gmail.com"><i class="fas fa-envelope"
                                style='background: rgb(216, 167, 167); padding: 10px;border-radius:12px;color: #fff;'></i>
                            Email
                        </a>
                           
                    </div>
                </div>
            </div>

            <div class="formmethod">
               
                <form action="" method="post"id="contact-form">
                    <h2>Send Message</h2>

                    <?php
                        if(!empty($message)){
                            echo $message;
                        }
                        elseif(!empty($error)){
                            echo $error;
                        }
                    ?>
                    <div class="input">
                            <label for="name">Username</label>
                            <input type="text"name="name" id="name"required>
                        </div>

                        <div class="input">
                            <label for="number">Phone Number</label>
                            <input type="tel"name="number" id="number"required>
                        </div>

                        <div class="input">
                            <label for="message">Message</label>
                            <textarea name="message" id="textarea"required></textarea>
                        </div>
                    <button type="submit"name="sendbtn"id="sendmessage">Send Message <i class="fas fa-paper-plane"></i> </button>
                </form>
            </div>
        </div>
    </div>
</body>
<style>
    
    .contact-wrapper {
    display: flex;
    margin: 0;
    background: #fff;
    height: 100vh;
    align-items: center;
    width: 100%;
    justify-content: center;

}
.wrapper-contact{
    margin: 12px;
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    height: 100vh;
}



.contact-card {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 15px;
    margin: 12px;
    height: 20rem;
    background: #e7ddb9;
    border-radius: 12px;
    height: auto;
    margin: 12px;

}
.formmethod{
     width: 90%;
}
.input{
   position: relative;
   display: flex;
   gap: 12px;
   flex-direction: column;

}
form{
    display
    background: transparent;
    box-shadow: 0 0 0;
     width: 90%;
    
    }

form input,#textarea{
    width: 100%;
    border-radius: 5px;
    padding: 15px;
    border: 1px solid #b1b0b0;
}

.more {
    display: flex;
    flex-direction: column;
}

.more .socials {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.more .socials a {
    text-decoration: none;
}
</style>
</html>