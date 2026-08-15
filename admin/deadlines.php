<?php
include("../connection.php");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deadlines</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
    
    
    
</head>
<body>
<section class="deadline-wrapper">
     
  <div class="btns">
    <button onclick="history.back()"id="backbtn"style='width:5rem;'><i class="fas fa-undo"></i>    Back</button>
   <a href="add_deadline.php">
    <button id="add_news"><i class="fas fa-plus"></i>Add Deadlines</button>
   </a>
  </div>
   <!-----------------------------datelines------>
    <div class="deadlinedisplay">
        <div class="deadline-card">
            <div class="title">
                <p class="heading">Deadlines</p>
            </div>
            <ol>
            <?php
            $select_deadlines="SELECT * FROM deadlines";

            $results = mysqli_query($connection,$select_deadlines);    
            if(mysqli_num_rows($results)>0){
                while($row = mysqli_fetch_assoc($results)){?>
                <div class="results">
                    <li><?php echo $row['deadline']?></li>
                
                    <div class="deadline-buttons">
                        <a href="delete_deadline.php?id=<?php echo $row['id'];?>">
                            <button id="delete_deadline_btn">
                                <i class="fas fa-trash"></i>
                            </button>
                        </a>

                        <a href="edit_deadline.php?id=<?php echo $row['id'];?>">
                            <button id="edit_deadline_btn"> 
                                <i class="fas fa-pen"></i>
                            </button>
                        </a>
                    </div>
                </div>
                

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