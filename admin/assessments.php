<?php

include("../connection.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessments tests</title>
     <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
    <div class="article-wrapper">
        <button onclick="history.back()"id="backbtn"><i class="fas fa-undo"></i>Back</button>
        <a href="cats.php">
            <button id="add_news"><i class="fas fa-plus"></i>Add CAT  <i class="fas fa-layer-group"></i></button>
        </a>
        

        <article style="background: white; box-shadow: 2px 2px 12px #333;">
             <fieldset>
                <legend><p class="den">Assessments Tests <i class="fas fa-layer-group"></i></p></legend>
                <div class="notes">
                    <ol>
                    <?php 
                    $select ="SELECT * FROM cats";
                    $results =mysqli_query($connection , $select);

                    if($results && mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            ?>
                            
                            <li><?php echo $row['description'];?></li>
                            <div class="view">
                                <a href="../assessments.php">
                                    <button id="add_news">View   <i class="fas fa-reply"></i></button>
                                </a>

                                <a href="edit_cat.php?id=<?php echo $row['id'];?>">
                                    <button id="Revision_btn">Edit  <i class="fas fa-pen"></i></button>
                                </a>

                                <a href="delete_cat.php?id=<?php echo $row['id'];?>">
                                    <button id="delete_deadline_btn"
                                    onclick="return confirm('Delete this CAT?')">Delete  <i class="fas fa-trash"></i></button>
                                </a>
                            </div>
                            
                        <?php
                        }
                    }
                    else{
                        echo"This content is unavailable this moment";
                    }
                    ?>
                    </ol>
                </div>
            </fieldset>
            
        </article>
    </div>
</body>
</html>