<?php
session_start();
require_once('../../Database/connection1.php');

if(!isset($_SESSION['uid']))
{
    header("location:../../home.html");
}
if(!empty($_POST["college_id"]))
{ 
    $_SESSION['col']=$_POST["college_id"];
    // Fetch department data based for the specific college 
    $query = "SELECT * FROM department WHERE college_id = ".$_POST['college_id']."";
    $result=$db->query($query); 
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
        echo '<option value="">Courses not available</option>'; 
    } 
}
else if(!empty($_POST["dept_id"]))
{
    $clgid=$_SESSION['col'];
    $_SESSION['dept']=$_POST['dept_id'];
    $depid=$_SESSION['dept'];
    // Fetch course data based for the specific college and department 
    $query = "SELECT * FROM course WHERE dept_id=$depid";
    $result = $db->query($query); 
     
    // Generate HTML of course options list 
    if($result->num_rows > 0)
    { 
        echo '<option value="">Select Course</option>'; 
        while($row = $result->fetch_assoc())
        {  
            echo '<option value="'.$row['course_id'].'">'.$row['c_name'].'</option>'; 
        }
    }
    else
    { 
        echo '<option value="">Courses not available</option>'; 
    }
}
else if(!empty($_POST["course_id"]))
{
    $_SESSION['course']=$_POST['course_id'];
}
?>