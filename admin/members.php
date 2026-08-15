<?php
include("../connection.php");


 $select= "SELECT * FROM members ";

 $results = mysqli_query($connection, $select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../fontawesome-free-7.2.0-web/css/all.min.css">
</head>
<body>
   

<div class="members-wrapper">
       <div class="head">
            <button onclick='history.back()'id="backbtn"><i class="fas fa-undo"></i>   Back</button>
            <p class="den">Registered members</p>
       </div>
    <table>
        <tr>
            <th>Id</th>
            <th>username</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Profile</th>
            
        </tr>
 <?php   
    if(mysqli_num_rows($results)>0){
        while($row=mysqli_fetch_assoc($results)){?>
            <tr>
                <td> <?php echo $row['id'];?> </td>
                <td> <?php echo $row['username'];?> </td>
                <td> <?php echo $row['email'];?> </td>

                <td> <a href="delete_members.php?id=<?php echo $row['id'];?>">
                    <button onclick="return confirm('Are you sure you want to delete this item?')"id="deletemember">
                        <i class="fas fa-trash"></i>
                    </button>
                </a> </td>

                <td> <a href="viewprofile.php?id=<?php echo $row['id'];?>">
                    <button id="seemember">
                        <i class="fas fa-user-circle"> </i>
                    </button>
                </a> </td>
            
        <?php
        }
        }
        else{
            echo"No member is registered";
        }
        ?>

        </tr>
    </table>
</div>

    
  
    
</body>
</html>