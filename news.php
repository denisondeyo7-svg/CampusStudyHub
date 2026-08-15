<?php

include("connection.php");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
    <div class="article-wrapper">
        <button onclick="history.back()"id="backbtn"><i class="fas fa-undo"></i>   Back</button>
        

        <article>
            <?php
            $select_data ="SELECT * FROM  news";

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
</body>
</html>