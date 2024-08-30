<?php
session_start();
if(!isset($_SESSION['uid']))
{
  echo"<script>alert('Unauthorised access!!!');</script>";
  die();
}
<<<<<<< HEAD
require_once('../Database/connection.php');

=======
$connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}
>>>>>>> be24171 (README.md file committed!)
if(!isset($_REQUEST['submit']))
{
  $_SESSION['course'] = $_REQUEST['course'];
  $_SESSION['sem'] = $_REQUEST['sem'];
  $_SESSION['subject'] = $_REQUEST['subject'];
  $_SESSION['exam_type'] = $_REQUEST['exam_type'];
}
//print_r($_SESSION);
//$sql = "select department.dept_name,course.course_id,course.c_name,faculty.faculty_id from course,department,faculty where department.dept_id = faculty.dept_id and course.dept_id = department.dept_id and faculty.user_id = ".$_SESSION['uid'];
//$result = mysqli_query($connection,$sql);
//$row = mysqli_fetch_assoc($result);

$sql = "SELECT exam_id, exam_name,descr,total_marks FROM exam WHERE exam_id=".$_SESSION['exam_type'];  
$result = mysqli_query($connection,$sql);
$exam_row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STMS-Add marks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Eagle+Lake&display=swap');
      
        .navbar-brand {
          font-family: 'Eagle Lake', cursive;
        }
        li:hover ,span.decorate :hover {
        background-color: #21d190;
        background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
        border-radius: 3px;
        color: whitesmoke;
        }
        html, body {
          height:100%;
        }
        body{
          margin: 5%; /*5% margin from all the sides of the html page */ 
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
        }
        .center {
          margin: auto;
          width: 80%;
          border: none;
          padding: 10px;
          margin-top: 6%;
          /* background-color: #f6ead4 ; */
          background-color: whitesmoke ;
          border-radius: 10px;
          z-index: 1;
        }
        button.btn-primary {
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          border: none;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size:16px;
          margin:4px 2px;
          cursor:pointer;
          transition-duration: 0.4s;
        }
        button.btn-primary:hover {
          box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        th,td {
          text-align: center;
        }
  </style>
<script>  
      (function () {  
            'use strict';  
            window.addEventListener('load', function () {  
                var form = document.getElementById('needs-validation');

                form.addEventListener('submit', function (event){  
                    if (form.checkValidity() === false) 
                    {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    }  
                    form.classList.add('was-validated');  
                }, false);
            }, false);
        })();
  </script>
</head> 

<body>

    <nav class="navbar py-3 navbar-expand-sm bg-dark navbar-dark fixed-top">
        <!-- Brand -->
        <a class="navbar-brand" href="faculty.php">STMS</a>
      
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="faculty.php">Home</a>
          </li>
          <!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Administration
            </a>
            <div class="dropdown-menu">
              <span class="decorate"><a class="dropdown-item" href="addsubject.php">Add Subject</a></span>
              <span class="decorate"><a class="dropdown-item" href="addmarks.php?exam=CE_I">Add CE-I Marks</a></span>
              <span class="decorate"><a class="dropdown-item" href="addmarks.php?exam=CE_II">Add CE-II Marks</a></span>
              <span class="decorate"><a class="dropdown-item" href="addmarks.php?exam=ESE">Add ESE Marks</a></span>
              <span class="decorate"><a class="dropdown-item" href="updatemarks.php">Update Marks</a></span>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Report
            </a>
            <div class="dropdown-menu">
              <span class="decorate"><a class="dropdown-item" href="subjectreport.php">Subject Reports</a></span>
              <span class="decorate"><a class="dropdown-item" href="searchresult.php?">Search Result</a></span>
              <span class="decorate"><a class="dropdown-item" href="studentreport.php">Student Reports</a></span>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav dropdown ml-auto">
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
<<<<<<< HEAD
              <img src="<?php echo$_SESSION['photo'];?>" width="30px" height="30px" style="border-radius:50%;"/>&nbsp;&nbsp;
=======
              <img src="/STMS/res/user<?php echo$_SESSION['uid'].".".$_SESSION['photo'];?>" width="30px" height="30px" style="border-radius:50%;"/>&nbsp;&nbsp;
>>>>>>> be24171 (README.md file committed!)
              Welcome&nbsp;<?php echo$_SESSION['name'];?>&nbsp;!
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <span class="decorate"><a class="dropdown-item" href="account.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a></span>
                <span class="decorate"><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log out</a></span>
              </div>
            </li>
        </ul>
    </nav>
   
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET" class="center" novalidate id="needs-validation">
        <div class="table-responsive">  
          <table class="table table-hover table-bordered">
          <thread class="thread-dark"></thread>
          <tr>
            <th scope="col" class="col-sm-2">Roll No</th>
            <th scope="col" class="col-sm-2">Name</th>
            <th scope="col" class="col-sm-2"><?php echo$exam_row['exam_name'] ?> <br> <?php echo$exam_row['total_marks']?> Marks</th>
          </tr>
          <?php 
            $sql = "SELECT student.roll_no, student.PRN , user.u_name FROM student, user WHERE user.user_id = student.user_id AND student.semester = ".$_SESSION['sem']." AND student.course_id=".$_SESSION['course'];
            $result = mysqli_query($connection,$sql);
            $f=0;
            while($row = mysqli_fetch_assoc($result))
            {
              echo"<tr>";
                echo"<td>".$row['roll_no']."</td>";
                echo"<td>".$row['u_name']."</td>";
                echo"<td><input class='form-control' name='".$row['PRN']."' type = 'number' min='0' max=".$exam_row['total_marks']." required></td>";
                $f=1;
                echo"<tr>";
                //echo"<div class='invalid-tooltip'>Please enter the marks within the valid range.</div>";
            }
            if($f==0)
                echo"<td colspan=3><h4>No students</h4></td>";
          ?>
          </table>
        </div>

      <div class="form-group row">
      <label for="add_subject" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-10" style="margin-left: 43%;">
          <button type="submit" name="submit" class="btn btn-primary" value="upload" >Upload marks</button>
        </div>
      </div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_REQUEST['submit']) )
{ 
  $flag = 0; 
  foreach ($_REQUEST as $PRN=>$marks)
  {
    if ($PRN!="submit")
    {
      $sql = "SELECT COUNT(r_id) from result where sub_id=".$_SESSION['subject']." and exam_id=".$_SESSION['exam_type']." and PRN=$PRN";
      $result = mysqli_query($connection,$sql);
      $count = mysqli_fetch_row($result);
      
      $flag = 0;
      if ($count[0]==0)
      {
        $sql = "INSERT INTO result(PRN, sub_id, exam_id, score, uploaded_on) VALUES($PRN, ".$_SESSION['subject'].", ".$_SESSION['exam_type'].", $marks,'".date('Y-m-d H:i:s')."')";
        if (mysqli_query($connection, $sql)) 
        {
          $flag=1;
        }
      }
      else 
      {
        $sql = "UPDATE result SET result.score = $marks, uploaded_on = '".date('Y-m-d H:i:s')."' WHERE result.PRN=$PRN AND sub_id=".$_SESSION['subject']." AND exam_id=".$_SESSION['exam_type']."";
        if (mysqli_query($connection, $sql)) 
        {
          $flag=1;
        }
      }
    }
  }
  if($flag==0)
  {?>

    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error!</strong> Marks could not be uploaded!<?php echo mysqli_error($connection);?>
    </div>

  <?php }
  else
  {?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Marks uploaded successfully.
      </div>
  <?php }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //echo $data."<br>";
  return $data;
} 
mysqli_close($connection);
?>
    </form> 
  </body>    
</html>