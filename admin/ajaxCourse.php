<?php
session_start();
$dbHost     = "localhost"; 
$dbUsername = "anand"; 
$dbPassword = "Happy@123"; 
$dbName     = "STMS"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName); 
 
// Check connection 
if ($db->connect_error) 
{ 
    die("Connection failed: " . $db->connect_error);
}
if(!isset($_SESSION['uid']))
{
  header("location:/home.html");
  /*echo"<script>alert('Unauthorised access!!!');</script>";
  die();*/
}
if(!empty($_POST["college_id"]))
{ 
    // Fetch department data based for the specific college 
    $query = "SELECT * FROM department WHERE college_id = ".$_POST['college_id']."";
    $result = $db->query($query); 
     
    // Generate HTML of department options list 
    if($result->num_rows > 0)
    { 
        echo '<option value="">Select Department</option>'; 
        while($row = $result->fetch_assoc())
        {  
            echo '<option value="'.$row['dept_id'].'">'.$row['dept_name'].'</option>'; 
        }
    }
    else
    { 
        echo '<option value="">Department not available</option>'; 
    } 
}
?>