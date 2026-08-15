<?php
session_start();

include("connection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastpapers</title>
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-pdf-wrapper">
        <div class="pdf-wrapper">
            <div class="boxx">
        
                <div class="content">
                    <button onclick="history.back()"id="backbtn"><i class="fas fa-undo"></i>   Back</button>
                    <p>Hello <?php echo $_SESSION['username'];?> !</p>
                    <div class="welcome">
                        <p>Access all  assessments here.</p>
                    </div>
                </div>
            
            </div>

            <fieldset>
                <legend><p class="den">1 <sup>ST</sup> Year Semister 1 Revision PDFS</p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats where year = '1' and semister='1'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="tests/<?php echo $row['pdf'];?>" id="downloadnotes" download="tests/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="tests/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Content not available at this moment";
                    }
                    ?>
                    </ol>
                </div>
        

<br>
           
                <legend><p class="den">Semister 2 Revision PDFS</p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats where year = '1' and  semister='2'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="tests/<?php echo $row['pdf'];?>" id="downloadnotes" download="tests/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="tests/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Content not available at this moment";
                    }
                    ?>
                    </ol>
                </div>
            </fieldset>

            <br>
            <fieldset>
                <legend><p class="den">2 <sup>ND</sup> Year Semister 1 Revision PDFS</p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats where year = '2' and semister='1'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="tests/<?php echo $row['pdf'];?>" id="downloadnotes" download="tests/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="tests/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Content not available at this moment";
                    }
                    ?>
                    </ol>
                </div>
          

<br>
            
                <legend><p class="den">Semister 2 Revision PDFS</p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats where year = '2' and  semister='2'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="tests/<?php echo $row['pdf'];?>" id="downloadnotes" download="tests/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="tests/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Content not available at this moment";
                    }
                    ?>
                    </ol>
                </div>
            </fieldset>

            <br>


            <fieldset>
                <legend><p class="den">3<sup>RD</sup> Year Semister 1 Revision PDFS</p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats where year = '3' and semister='1'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="tests/<?php echo $row['pdf'];?>" id="downloadnotes" download="tests/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="tests/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Content not available at this moment";
                    }
                    ?>
                    </ol>
                </div>
            
<br>
           
                <legend><p class="den">Semister 2 Revision PDFS</p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats where year = '3' and  semister='2'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="tests/<?php echo $row['pdf'];?>" id="downloadnotes" download="tests/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="tests/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Content not available at this moment";
                    }
                    ?>
                    </ol>
                </div>
            </fieldset>

            <fieldset>
                <legend><p class="den">4<sup>TH</sup> Year Semister 1 Revision PDFS</p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats where year = '4' and semister='1'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="tests/<?php echo $row['pdf'];?>" id="downloadnotes" download="tests/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="tests/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Content not available at this moment";
                    }
                    ?>
                    </ol>
                </div>
           
<br>
            
                <legend><p class="den">Semister 2 Revision PDFS</p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats where year = '4' and  semister='2'";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="cta_links">
                                <a href="tests/<?php echo $row['pdf'];?>" id="downloadnotes" download="tests/<?php echo $row['pdf'];?>">Download notes  
                                    <i class="fas fa-download"></i>
                                </a>

                                <a href="tests/<?php echo $row['pdf'];?>" target="_blank" id="readnotes">Read online 
                                    <i class="fas fa-wifi"></i>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"Content not available at this moment";
                    }
                    ?>
                    </ol>
                </div>
            </fieldset>

        </div>
    </div>
</div>
</body>
</html>