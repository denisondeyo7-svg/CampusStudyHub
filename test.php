<?php

include("connection.php");

if($connection){
    echo"Connection successful";
    
}
else{
    echo"Failed to connect to the database";
    
}

?>