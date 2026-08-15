<?php
include("connection.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deadlines</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
<section class="deadline-wrapper">
     
  <button onclick="history.back()"id="backbtn"style='width:5rem;'><i class="fas fa-undo"></i>   Back</button>
      
    <!-----------------------------datelines------>
    <div class="deadlinedisplay">
        <div class="deadline-card">
            <div class="title">
                <p class="heading">Deadlines</p>
            </div>
            <ol>
            <?php
            $select_deadlines="SELECT * FROM deadlines ORDER BY ID DESC ";

            $results = mysqli_query($connection,$select_deadlines);    
            if(mysqli_num_rows($results)>0){
                while($row = mysqli_fetch_assoc($results)){?>
                <li><?php echo $row['deadline']?></li>

            <?php
                }
            }
            else{
                echo"No data availble now...";
            }
            ?>
            
            </ol> 
        </div>
    </div>

</section>    
</body>
</html>