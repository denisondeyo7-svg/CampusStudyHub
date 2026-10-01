<?php
session_start();

include("connection.php");

if(!isset($_SESSION['username'])){

    header("Location: front-end/login.html");

    exit();
}

#Total registered members 

$registered_members ="SELECT count(*) as total_members from members";

$results = mysqli_query($connection ,$registered_members);

$total_members = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $total_members = $row['total_members'];


}
#users who are online
$online_members= "SELECT  sum(status) as online_users from members where status='Online'";

$results = mysqli_query($connection ,$online_members);

$online_users = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $online_users = $row['online_users'];


}
//notes
$total_pdfs ="SELECT count(*) as pdf_notes from notes";

$results = mysqli_query($connection ,$total_pdfs);

$pdf_notes = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $pdf_notes = $row['pdf_notes'];


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="file_000000002488722fb534a48b1deedd3a.png" alt="#logo">
        </div>
        <div id="menubtn">≡</div>
    </header>

    <div id="overlay">≡</div>

    <div class="menu" id="menu">
        <div id="closebtn">×</div>
        <a href="dashboard.php"><i class="fa-regular fa-house"></i>     Dashboard</a>
        <a href="front-end/timetable.html"><i class="fas fa-clock"></i>   Timetable</a>
        <a href="front-end/level.html"><i class="fas fa-layer-group"></i>   Notes</a>
        <a href="assessments.php"><i class="fa-regular fa-file"></i>   Assessment Tests</a>
        <a href="pastpapers.php"><i class="fas fa-graduation-cap"></i>   Past Papers</a>
        <a href="news.php"><i class="fas fa-newspaper"></i>   News and Events</a>
        <a href="front-end/contact.php"><i class="fas fa-headset"></i>   Contact Support</a>
        <a href="profile.php"><i class="fas fa-user-gear"></i>   Profile</a>
        <a href="logout.php"><i class="fas fa-right-from-bracket"></i>   Logout</a>
    </div>
    
    <div class="dashboard">
        <section class="boxes">
            <br>
            <div class="box">
                <div class="welcome">
                    <p>
                        <h2>Hello and welcome back <?php echo $_SESSION['username'];?>!</h2>Welcome  to Campus study Hub. We ensure that you don't miss any deadline , stay informed with any news and updates, get in touch with timetable , revision pdfs and notes for your studies, we are delighted to have you.

                    </p>
                </div>
            </div>

            <!--------------------classes------------->
            <div class="box">
                <div class="title">
                    <p class="heading">Today's Class</p>
                </div>
                <table>
                    
                    <tr>
                        <th>Time</th>
                        <th>Day</th>
                        <th>Class</th>
                        <th>Venue</th>
                    </tr>
                    <tr>
                        <td>8:00</td>
                        <td>Mon</td>
                        <td>BIT1220</td>
                        <td>ABB202</td>
                    </tr>
               
                </table>

                
                
            </div>

            <!-----------------------------datelines------>
            <div class="box">
                <div class="title">
                    <p class="heading">Deadlines</p>
                </div>
                <ol>
                    <?php
                $select_deadlines="SELECT * FROM deadlines ORDER BY ID DESC LIMIT 2";

                $results = mysqli_query($connection,$select_deadlines);    
                if(mysqli_num_rows($results)>0){
                    while($row = mysqli_fetch_assoc($results)){?>
                    <li><?php echo $row['deadline']?></li>
    
                <?php
                    }
                }
                else{
                    echo"No data availble now";
                }
                ?>

                    
                </ol> 
                <a href="deadlines.php"id='deadlines'>More deadlines</a>
            </div>


            <!-----------------------------news and updates------>
            <div class="box">
                <div class="title">
                    <p class="heading">News and Events</p>
                </div>
                <article>
            <?php
            $select_data ="SELECT * FROM  news ORDER BY ID DESC LIMIT 3";

            $results = mysqli_query($connection , $select_data);
            if($results && mysqli_num_rows($results)> 0){
                while($row= mysqli_fetch_assoc($results)){?>  

                    <article class="news-content">

                       <div class="newsimg">
                            <img src="imagenews/<?php echo $row['image'];?>"id="imgnews">
                        </div>
                        
                        <p style='margin:12px;'> <?php echo $row['agenda'];?> </p>
                    </article>
                <?php
                }
            }
            else{
                echo"No news found at this moment";
            }
            ?>

            </article>
                
            </div>


        </section>
        <br/>
        <div class="about_wrapper">
            <h2>About us</h2>

            <div class="about_content">
                <div class="about-card">
                    <div class="slider">
                        <img src="1774128504685.png" id="about_image"alt="">
                        <img src="file_000000002488722fb534a48b1deedd3a.png" id="about_image"alt="">
                        <img src="file_000000005f5071fdaf588c776ad6c2a1.png" id="about_image"alt="">
                        <img src="1785571552364 (1).png" id="about_image"alt="">
                    </div>
                    
                    <p>As Campus study Hub, We ensure that you don't miss any deadline , stay informed with any news and updates, get in touch with timetable , revision pdfs and notes for your studies, we are delighted to have you.</p>
                    <h2>Get in touch</h2>
                    <p>For more inquiries and assistant we are here to offer help ,reach us through the following :</p>
            
                    <div class="socials-links">
                        <a href="http://wa.me/254726534460"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                        <a href="http://web.facebook.com/amazing.denis.24"><i class="fab fa-facebook"></i> Facebook</a>
                        <a href="mailto:denisondeyo7@gmail.com"><i class="fab fa-google"></i> Email </a>
                        <a href="tel:+254726534460"><i class="fas fa-phone"></i> Call now</a>
                    </div>
                </div>
                
            </div>
            
        </div>
        <h2 style='color: #007bff;'>Our stats</h2>
        <div class="stats_wrapper">
            <div class="statsbox">
                <div class="content">
                    <p>Registered members</p>
                    <i class="fa-regular  fa-user"id="icon"></i>
                    
                </div>
                <h3><?php echo $total_members?></h3>
            </div>

            <div class="statsbox">
                <div class="content">
                    <p>Online members</p>
                    <i class="fa-regular  fa-user"id="icon"></i>
                    
                </div>
                <h3><?php echo $online_users?></h3>
            </div>

            <div class="statsbox">
                <div class="content">
                    <p>Uploaded Notes</p>
                    <i class="fas  fa-book"id="icon"></i>
                    
                </div>
                <h3><?php echo $pdf_notes?></h3>
            </div>


        </div>
        
        <!--------------foter----------->
        <footer class="footer2">
            <div class="footer-wrapper">
                <div class="main-footer">
                <div class="developer">
                    <h2>Campus Study Hub</h2>
                    <p>Developed By Denis</p>
                    <a href="front-end/documentation.html">Documentation</a>
                </div>

                <div class="developer">
                    <h2>Links</h2>
                    <a href="dashboard.php">Dashboard</a>
                    <a href="front-end/timetable.html">Timetable</a>
                    <a href="front-end/notes.html">Notes</a>
                    <a href="">Past Papers</a>
                    <a href="">News and Events</a>
                    <a href="front-end/contact.php">Contact</a>
                    <a href="profile.php">Profile</a>
                    <a href="logout.php">Logout</a>
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
                <small>&copy AmazingDenis 2026</small>
                <small>Campus study hub</small>
            </div>
        </div>
        
    </footer>
</section>


    <script>
        closebtn =document.getElementById('closebtn');
        menubtn =document.getElementById('menubtn');
        menu =document.getElementById('menu');
        overlay =document.getElementById('overlay');

        menubtn.addEventListener('click',(e)=>{
        e.stopPropagation();
            menu.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        closebtn.addEventListener('click',(e)=>{
        e.stopPropagation();
            menu.classList.remove('active');
            overlay.classList.remove('active');
        });

        overlay.addEventListener('click',(e)=>{
        e.stopPropagation();
            menu.classList.remove('active');
            overlay.classList.remove('active');
        });

        window.addEventListener('click',(e)=>{
            if(!menu.contains(e.target)){
                menu.classList.remove('active');
                overlay.classList.remove('active');
            }
        });
    </script>
</body>
</html>