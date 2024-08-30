<?php

<<<<<<< HEAD
require_once('../Database/connection.php');

=======
$connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}
>>>>>>> be24171 (README.md file committed!)
if(isset($_POST['cid']) and isset($_POST['sem']))
{
    $cid = $_POST['cid'];
    $sem = $_POST['sem'];
    if(isset($_POST['fid'])) {
        $fid = $_POST['fid'];
        //echo$_POST['sem'].$fid.$cid;
        $sql = "SELECT subject.sub_id, subject.sub_name FROM subject WHERE course_id = $cid AND subject.f_id = $fid AND semester=".$sem;
        $result = mysqli_query($connection,$sql);
        $f=0;
        while($row = mysqli_fetch_assoc($result))
        {
            if ($f==0)
            {
                echo"<option value=''>Select Subject</option>";
            }
            echo"<option value='".$row['sub_id']."'>".$row['sub_name']."</option>"; 
            $f=1;
        }
        if($f==0)
            echo"<option value=''>NA</option>";
    }
    else {
        $sql = "SELECT student.roll_no, student.PRN, user.u_name FROM student, user WHERE user.user_id = student.user_id AND student.semester = ".$sem." AND student.course_id=".$cid;
        $result = mysqli_query($connection,$sql);
        $f=0;
        while($row = mysqli_fetch_assoc($result))
        {
            echo"<option value='".$row['PRN']."'>".$row['roll_no']."&nbsp;".$row['u_name']."</option>";
            $f=1;
        }
        if($f==0)
            echo"<option value=''>No Students</option>";
    }
}

else if(isset($_POST['course_id']))
{
    $sql = "SELECT c_duration from course where course_id=".$_POST['course_id'];
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row['c_duration'])
    {
        $sems = $row['c_duration']*2;
        echo"<option value=''>Select Semester</option>";
        for ($i=1; $i <= $sems; $i++) { 
            echo"<option value=".$i.">$i</option>";
        }
    }
    else{
        echo"<option value=''>Select Semester</option>";
    }
}

else if(isset($_POST['eid']))
{
    $sql = "SELECT total_marks FROM exam WHERE exam_id=".$_POST['eid'];
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row['total_marks'])
        echo $row['total_marks']." Marks";  
}
mysqli_close($connection);
?>