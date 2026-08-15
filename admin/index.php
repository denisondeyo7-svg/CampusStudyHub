<?php
session_start();
include("../connection.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] !="Admin" ){
    header("Location: campus_study_hub\front-end\login.html");
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
#finding the total news posted 

$news ="SELECT count(*) as total_news from news";

$results = mysqli_query($connection ,$news);

$total_news = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $total_news = $row['total_news'];


}

#finding the total deadlines

$deadlines ="SELECT count(*) as total_deadlines from deadlines";

$results = mysqli_query($connection ,$deadlines);

$total_deadlines = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $total_deadlines = $row['total_deadlines'];


}

#users who are online
$online_members= "SELECT  sum(status) as online_users from members where status='Online'";

$results = mysqli_query($connection ,$online_members);

$online_users = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $online_users = $row['online_users'];


}

#admins
$admins_total= "SELECT  sum(role) as admins from members where role='Admin'";

$results = mysqli_query($connection ,$admins_total);

$admins = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $admins = $row['admins'];


}

//notes
$total_pdfs ="SELECT count(*) as pdf_notes from notes";

$results = mysqli_query($connection ,$total_pdfs);

$pdf_notes = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $pdf_notes = $row['pdf_notes'];


}

//pdfs
$revision_pdfs ="SELECT count(*) as pdfs from past_papers";

$results = mysqli_query($connection ,$revision_pdfs);

$pdfs = 0;

if ($results && mysqli_num_rows($results)> 0){

    $row = mysqli_fetch_assoc($results);

    $pdfs = $row['pdfs'];}


//cats

$select_cats ="SELECT COUNT(*) as all_cats FROM cats";

$results =mysqli_query($connection,$select_cats);

$all_cats = 0;

if($results && mysqli_num_rows($results)>0){
    $row = mysqli_fetch_assoc($results);

    $all_cats = $row['all_cats'];
}

//messages

$select_cats ="SELECT COUNT(*) as all_messages FROM messages";

$results =mysqli_query($connection,$select_cats);

$all_messages = 0;

if($results && mysqli_num_rows($results)>0){
    $row = mysqli_fetch_assoc($results);

    $all_messages = $row['all_messages'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
    <section class="admin-wrapper">
        <section class="sidebar">
        
            <a href="index.php"><i class="fa-regular fa-house"></i>   Dashboard</a>
            <a href="members.php"><i class="fas fa-calendar-days"></i>   Manage Members</a>
            <a href="notes_page.php"><i class="fas fa-graduation-cap"></i>   Notes</a>
            <a href="assessments.php"><i class="fas fa-file-pen"></i>   Assessment Tests</a>
            <a href="past_papers.php"><i class="fas fa-layer-group"></i>   Revision papers</a>
            <a href="deadlines.php"><i class="fas fa-calendar-days"></i>   Manage Deadlines</a>
            <a href="messages.php"><i class="fas fa-message"></i>   Messages <sup ><?php echo $all_messages ;?></sup></a>
            <a href="news_management.php"><i class="fas fa-newspaper"></i>   Manage News</a>
            <a href="../logout.php"><i class="fas fa-right-from-bracket"></i>   Logout</a>
             

          

            
        </section>
        <section class="heros">
            
            <div class="box-wrapper">
                <div class="welcome">
                    <p>Welcome to your dashboard admin <span id="name"> <?php echo $_SESSION['username'];?></span>, everything is ready for your control. <p></p></p>
                </div>
                <!-----boxes---->
                <div class="boxes">
                    <div class="box">
                        <div class="content">
                            <p>Registered members
                                <i class="fas fa-users"id="icon"></i>
                            </p>
                            <h3><?php echo $total_members?></h3>
                        </div>
                    </div>

                    <div class="box">
                        <div class="content">
                            <p>Posted News
                                <i class="fas fa-newspaper"id="icon"></i>
                            </p>
                            <h3><?php echo $total_news?></h3>
                        </div>
                    </div>

                    <div class="box">
                        <div class="content">
                            <p>Deadlines
                                <i class="fas fa-calendar-alt"id="icon"></i>
                            </p>
                            <h3><?php echo $total_deadlines?></h3>
                        </div>
                    </div>

                    <div class="box">
                        <div class="content">
                            <p>Online members
                                <i class="fas fa-toggle-on"id="icon"></i>
                            </p>
                            <h3><?php echo $online_users;?></h3>
                        </div>
                    </div>

                    <div class="box">
                        <div class="content">
                            <p>Admins
                                <i class="fas fa-shield"id="icon"></i>
                            </p>
                            <h3><?php echo $admins;?></h3>
                        </div>
                    </div>

                    <div class="box">
                        <div class="content">
                            <p>Notes available
                                <i class="fas fa-graduation-cap"id="icon"></i>
                            </p>
                            <h3><?php echo $pdf_notes;?></h3>
                        </div>
                    </div>

                    <div class="box">
                        <div class="content">
                            <p>Revision PDFs
                                <i class="fas fa-file-pdf"id="icon"></i>
                            </p>
                            <h3><?php echo $pdfs ?></h3>
                        </div>
                    </div>

                    <div class="box">
                        <div class="content">
                            <p>Assessment Tests
                                <i class="fas fa-file-pen"id="icon"></i>
                            </p>
                            <h3><?php echo $all_cats?></h3>
                        </div>
                    </div>

                </div>


                <div class="actions">
                    <fieldset>
                        <legend><p class="den">Quick actions</p></legend>
                            <nav>
                                <a href="add_member.php">Add member   <i class="fas fa-users"></i></a>
                                <a href="add_news.php">Add News / Events    <i class="fas fa-newspaper"></i></a>
                                <a href="add_deadline.php">Add a deadline      <i class="fas fa-calendar-days"></i></a>
                                <a href="form.php">Add notes     <i class="fas fa-layer-group"></i></a>
                            </nav>
                    </fieldset>
                </div>
                
            </div>
        </section>

    </section>
</body>
</html>