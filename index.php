<?php

include("connection.php");


$message = "";
$error="";
if(isset($_POST['sendmessage'])){

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
    <title>Campus Study Hub</title>
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="mytitle">
            <h1>Campus study Hub</h1>
        </div>

        <div class="start-links">
            <a href="front-end/login.php">
                <button id="login-index-btn">Login</button>
            </a>

            <a href="front-end/register.php">
                <button id="reg-btn">
                    Get started
                </button>
            </a>
        </div>
    </header>
    
    <div class="index-page-container">
        <br><br>
        <div class="slider-index">
            <img src="1774128504685.png" alt="">
           

            <div class="top">
             

             <div class="container-content">
                <h1>Campus study Hub</h1>
            
                <small>Only for Information Technology</small>
                <br>
                
                <div class="theme">
                    <p>
                        Access all your notes, revision papers, and campus news while staying on track with your timetable and deadlines.
                    </p>
                </div>
                <small>Developed by Denis</small>
                <br/><br/>
                <a href="front-end/register.php">
                    <button id="gobtn">Get Started</button>
                </a>
            </div>
            
       </div>
            
        </div>
       
        
           
            
        </div>


<br>
<br>
<br>
        <div class="about">
            <p class="aboutp">About Campus Study Hub</p>


            <div class="about-wrapper">
                <div class="about-card-index">
                    <h1>Our Story</h1>
                    <i class="fas fa-quote-left"></i>
                    <p>
                       Campus Study Hub is a modern student platform built to make campus life simpler, smarter, and more connected.

                    From class schedules and study notes to deadlines, events, news, and important updates, Campus Study Hub brings the things students need into one convenient space.
                    </p>
                    <i class="fas fa-quote-right"></i>
                </div>

                <div class="about-card-index">
                    <h1>Built for Student Life</h1>
                    <i class="fas fa-quote-left"></i>
                    <p>
                        University comes with a lot to keep track of. Classes. Assignments. Deadlines. Events. Announcements. Opportunities.

                        We bring it together.

                        Campus Study Hub helps students spend less time searching for information and more time learning, creating, and achieving.
                    </p>
                    <i class="fas fa-quote-right"></i>
                </div>

                

                <div class="about-card-index">
                    <h1>Our Vision</h1>
                    <i class="fas fa-quote-left"></i>
                    <p>
                        To build a smarter digital campus where information is accessible, opportunities are visible, and students are empowered to succeed.
                    </p>
                    <i class="fas fa-quote-right"></i>
                </div>

                <div class="about-card-index">
                    <h1>Our Mission</h1>
                    <i class="fas fa-quote-left"></i>
                    <p>
                        We turn everyday campus challenges into simple digital solutions—one feature at a time.

                        Campus Study Hub isn't just another student website.
                        It's a digital space built around the way students actually live, learn, and connect.

                        Study smarter. Stay organized. Stay connected.
                    </p>
                    <i class="fas fa-quote-right"></i>
                </div>

            </div>
<br/>
            <div class="contact">
                <h1>Share your message</h1>


                <div class="contact-container">
                    <form action=""method="post" class="index-form">

                        <?php
                            if(!empty($message)){
                                echo $message;
                            }

                            if(!empty($error)){
                                echo $error;
                            }


                        ?>
                        <div class="input">
                            <input type="text"name="name" placeholder="Username ..."required>
                        </div>

                        <div class="input">
                            <input type="tel"name="number" placeholder="phone ..."required>
                        </div>

                        <div class="input">
                            <textarea name="message" id="message"placeholder="type message here ..."required></textarea>
                        </div>
                        <button type="submit" name="sendmessage"id="sendmessage">Share Thought  <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <footer>
        <div class="footer-wrapper">
            <div class="main-footer">
                <div class="developer">
                    <h2>Campus Study Hub</h2>
                    <p>Developed By Denis</p>
                    <a href="front-end/documentation.html">Documentation</a>
                </div>

                

                <div class="developer">
                    <h2>Contact</h2>
                    <p>For more queries and assistant:</p>
                    <a href="http://wa.me/254726534460"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                    <a href="http://web.facebook.com/amazing.denis.24"><i class="fab fa-facebook"></i> Facebook</a>
                    <a href="mailto:denisondeyo7@gmail.com"><i class="fab fa-google"></i> Email </a>
                    <a href="tel:+254726534460"><i class="fas fa-phone"></i> Call now</a>
                    
                   
                </div>

            </div>
            <div class="subfooter">
                <small>&copy Campus study hub 2026</small>
                
            </div>
        </div>

    </footer>

    </div>
</body>

</html>