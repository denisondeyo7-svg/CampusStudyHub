<?php

include("../connection.php");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
    <div class="article-wrapper">
        <button onclick="history.back()"id="backbtn"><i class="fas fa-undo"></i>   Back</button>
        

        <article>
            <?php
            $select_data ="SELECT * FROM  messages";

            $results = mysqli_query($connection , $select_data);
            if($results && mysqli_num_rows($results)> 0){
                while($row= mysqli_fetch_assoc($results)){?>  

                   
                    <article class="news-content">
                        <?php
                            $letter = strtoupper(substr($row['name'],0,1));
                        ?>
                        
                        <div class="dp">
                            <div class="avatar">
                                <h2><?php echo $letter ?></h2>
                            </div>
                            <div class="details">
                                <small><?php echo $row['name'];?></small>
                                <small><?php echo $row['number'];?></small>
                            </div>
                        </div>
                        <p> <?php echo $row['message'];?> </p>
                        <a href="deletemessages.php?id=<?php echo $row['id'];?>">
                            <button id="deletebtn">Delete</button>
                        </a>
                    </article>

                <?php
                }
            }
            else{
                echo"No messages found from the database";
            }
            ?>

        </article>
    </div>
</body>
</html>