<?php
session_start();
<<<<<<< HEAD
require_once('../Database/connection.php');
=======
$connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}
>>>>>>> be24171 (README.md file committed!)

if(!isset($_SESSION['uid']))
{
  echo"<script>alert('Unauthorised access!!!');</script>";
  die();
}
$sql = "select department.dept_name,course.course_id,course.c_name,course.c_duration from course,department,faculty where department.dept_id = faculty.dept_id and course.dept_id = department.dept_id and faculty.user_id = ".$_SESSION['uid'];
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Subject</title>
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
          width: 60%;
          border: none;
          padding: 10px;
          margin-top: 6%;
          background-color: #f6ead4 ;
          border-radius: 10px;
          z-index: 1;
        }
        button.btn-primary {
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          color: whitesmoke;
          width: 7em;
          border: none;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size:16px;
          margin:4px 2px;
          cursor:pointer;
          transition: all 1s;
          transition-duration: 0.7s;
          transition-timing-function: ease-in-out;
        }
        button.btn-primary:hover {
          width: 20.5em;
          box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        h3 {
            font-size: 32px;
            /* background: -webkit-linear-gradient(#eee, #333); */
            background: -webkit-linear-gradient(#21d190, #d65bca);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
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
        $(document).ready(function(){
        // jQuery methods go here...
          $(".course").change(function(){
            //alert("course: " + $(".course").val());
            $(".sem").load("demo_test_post.php",
            {
              course_id: $(".course").val()
            } /* ,
            function(data,status){
              alert("\nStatus: " + data);
            } */ );
          });
        });
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
              <span class="decorate"><a class="dropdown-item" href="searchresult.php">Search Result</a></span>
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
      <h3>Add a New Subject</h3>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Department</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="sname" name="sname" value="<?php echo$row['dept_name']?>" disabled>
        </div>
      </div>

      <div class="form-group row ">
        <label for="Course" class="col-sm-2 col-form-label">Course</label>
        <div class="col-sm-5">
            <select class="custom-select course" name="course" required>
              <option value="">Select Course</option>
              <?php 
                do
                {?>
                  <option value="<?php echo$row['course_id'] ?>"><?php echo$row['c_name'] ?></option>
                <?php 
                }while($row = mysqli_fetch_assoc($result));?>
            </select>
            <div class="invalid-tooltip">Please select the Course.</div>
        </div>
      </div>
      
      <div class="form-group row ">
        <label for="Semester" class="col-sm-2 col-form-label">Semester</label>
        <div class="col-sm-5">
            <select class="custom-select sem" name="sem" required>
              <option value="">Select Semester</option>
            </select>
            <div class="invalid-tooltip">Please select the Semester.</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Subject</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="sname" name="sname" pattern="^[a-zA-Z -]{2,50}$" placeholder="Subject Name" required>
          <div class="invalid-tooltip">Please enter the Subject.</div>
        </div>
      </div>

      <div class="form-group row ">
        <label for="Credits" class="col-sm-2 col-form-label">Credits</label>
        <div class="col-sm-5">
        <input type="number" name='credits' class="form-control credits" min=0 max=10 placeholder="Credits for subject" required>
        <div class="invalid-tooltip">Please enter the credits .</div>
        </div>
      </div>

      <div class="form-group row">
      <label for="add_subject" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-3">
          <button type="submit" name="add" class="btn btn-primary" value="add" >Add</button>
        </div>
      </div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['add']) )
{
  $sname = test_input($_GET["sname"]);
  $cid = test_input($_GET["course"]);
  $sem =  test_input($_GET['sem']);
  $credits = test_input($_GET['credits']);

  $sql = "SELECT COUNT(sub_name) from subject where sub_name='".$sname."' and course_id=$cid";
  $result = mysqli_query($connection,$sql);
  $row = mysqli_fetch_row($result);

  if ($row[0]==0) {
    $get_fid_query = "SELECT faculty_id from faculty where user_id=".$_SESSION['uid'];
    $result = mysqli_query($connection,$get_fid_query);
    $row = mysqli_fetch_assoc($result);
  
    $sql = "INSERT INTO subject(sub_name, course_id, f_id,semester,credits) VALUES('".$sname."',$cid,".$row['faculty_id'].",".$sem.",$credits)";
    if (mysqli_query($connection, $sql)) {?>

      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Subject added successfyully.
        <?php header("refresh:0");?>
      </div>
    
      <?php } else {?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> Subject could not be added!<?php echo mysqli_error($connection);?>
        </div>
    <?php }

  } else {?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error!</strong> Subject already exists! 
    </div>
<?php }   
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
mysqli_close($connection);
?>
    </form> 
  </body>    
</html>