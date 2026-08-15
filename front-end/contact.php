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
                    <p style="text-align: center;">Share your thoughts</p>

                    <?php
                        if(!empty($message)){
                            echo $message;
                        }
                        elseif(!empty($error)){
                            echo $error;
                        }
                    ?>
                    <div class="input">
                        <input type="text" name="name" placeholder="Your name" required>
                    </div>

                    <div class="input">
                        <input type="number" name="number" placeholder="your Number" required>
                    </div>
                    <div class="input">
                        <textarea id="textarea"name="message" placeholder="Write your message here...."required></textarea>
                    </div>
                    <button type="submit"name="sendbtn"id="loginbtn">Send Message <i class="fas fa-paper-plane"></i> </button>
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
    align-items: center;
    gap: 1rem;
    padding: 15px;
    margin: 12px;
    height: 20rem;
    background: #e7ddb9;
    border-radius: 12px;
    height: auto;
    margin: 12px;

}
form{
        background: transparent;
        box-shadow: 0 0 0;
    
    }

    form input,#textarea{
        width: 22rem;
        outline: 1px solid #a8a4a4;
        border: none;
        border-radius: 12px;
    }
@media (max-width:600px){
    form{
        background: transparent;
        box-shadow: 0 0 0;
    
    }

    form input,#textarea{
        width: 22rem;
        outline: 1px solid #a8a4a4;
        border: none;
        border-radius: 12px;
    }
    
    .contact-card:hover {
        transform: translateY(-2px);
    }
}

.image {
    width: 20rem;
    height: 16rem;
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