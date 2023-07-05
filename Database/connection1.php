<?php

$dbHost     = "localhost"; 
$dbUsername = "yash"; 
$dbPassword = "Yash@123"; 
$dbName     = "STMS"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName); 
 
// Check connection 
if ($db->connect_error) 
{ 
    die("Connection failed: " . $db->connect_error);
}
?>
