<?php
session_start();
require_once('../../Database/connection1.php');

if(!isset($_SESSION['uid']))
{
    header("location:../../home.html");
  /*echo"<script>alert('Unauthorised access!!!');</script>";
  die();*/
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
        echo "<option value=''>No courses</option>"; 
    }
}
else if(!empty($_POST["course_id"]))
{
    $_SESSION['course']=$_POST['course_id'];
    $courseid=$_SESSION['course'];
    $dep=$_SESSION['dept'];
    $clg=$_SESSION['col'];
    // Fetch course duration based for the specific college and department and course id 
    $query="SELECT c_duration FROM course WHERE course_id=$courseid and dept_id=$dep";
    $result = $db->query($query);
    $row = $result -> fetch_assoc(); 
    $sem=$row['c_duration'];

    // Generate HTML of semester options list 
    if($result->num_rows > 0)
    {
        echo '<option value="">Select Semester</option>'; 
        for($x=1;$x<=2*$sem;$x++)
        {
            echo '<option value='.$x.'>'.$x.'</option>'; 
        }
    }
    else
    { 
        echo '<option value="">Semesters not available</option>'; 
    }
}
else if(!empty($_POST["semester"]))
{
    $_SESSION['SEM']=$_POST['semester'];
}
?>