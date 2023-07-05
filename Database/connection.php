<?php
    $connection =  mysqli_connect('localhost','yash','Yash@123','STMS',3306);
    if (!$connection) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
