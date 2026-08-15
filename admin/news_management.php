<?php

include("../connection.php");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
    <div class="article-wrapper">
        <div class="mybtns">
            <a href="index.php">
                <button id="backbtn"><i class="fas fa-undo"></i>   Back</button>
            </a>
            
            <a href="add_news.php">
                <button id="add_news"><i class="fas fa-plus"></i>Add news</button>
            </a>
        </div>
        

        <article>
            <?php
            $select_data ="SELECT * FROM  news order by id desc";

            $results = mysqli_query($connection , $select_data);
            if($results && mysqli_num_rows($results)> 0){
                while($row= mysqli_fetch_assoc($results)){?>  

                    
                    <article class="news-content">
                        <div class="newsimg">
                            <img src="../imagenews/<?php echo $row['image'];?>"id="imgnews">
                        </div>
                        <p> <?php echo $row['agenda'];?> </p>
                        <div class="buttons">
                            <a href="delete_news.php?id=<?php echo $row['id'];?>">
                                <button id="deletebtn">
                                    <i class="fas fa-trash"></i>   Delete
                                </button>
                            </a>

                            <a href="edit_news.php?id=<?php echo $row['id'];?>">
                                <button id="editbtn">
                                    <i class="fas fa-pen"></i>   Edit
                                </button>
                            </a>
                        </div>
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
</body>
</html>