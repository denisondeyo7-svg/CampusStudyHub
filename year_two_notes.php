<?php

session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css">
    <title>Notes- campus_study_hub</title>
</head>

<body>

    <div class="notes-wrapper">
        <div class="content">
            <button onclick="history.back()"id="backbtn"><i class="fas fa-undo"></i>Back</button>
            <h3>Hello <?php echo $_SESSION['username'];?> !</h3>
            <div class="welcome">
                <p>Access all  notes here.</p>
            </div>

        </div>
<br>
        
            <fieldset>
                <legend>Semister 1 Notes</legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM notes where year = '2' and semister ='1'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="Notes/<?php echo $row['pdf'];?>" id="downloadnotes" download="Notes/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="Notes/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Notes coming soon...";
                    }
                    ?>
                    </ol>
                </div>
            </fieldset>
        

<br>
            <fieldset>
                <legend>Semister 2 Notes</legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM notes where year = '2' and semister ='2'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="Notes/<?php echo $row['pdf'];?>" id="downloadnotes" download="Notes/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="Notes/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            </ol>
                        <?php
                        }
                    }
                    else{
                        echo"Notes coming soon...";
                    }
                    ?>
                    </ol>
                </div>
            </fieldset>
        


    </div>    
</body>

</html>