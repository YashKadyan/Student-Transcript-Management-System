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
$sql = "select department.dept_id,department.dept_name,course.course_id,course.c_name,faculty.faculty_id from course,department,faculty where department.dept_id = faculty.dept_id and course.dept_id = department.dept_id and faculty.user_id = ".$_SESSION['uid'];
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT exam_id, exam_name,descr,total_marks FROM exam where exam_id>2";  
$result1 = mysqli_query($connection,$sql2);
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
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
          background-color: #f6ead4;
          border-radius: 10px;
          z-index: 1;
        }
        button.btn-primary {
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          color: whitesmoke;
          width: 11em;
          border: none;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size:16px;
          margin:4px 2px;
          cursor:pointer;
          transition-duration: 0.4s;
          transition: width 1s;
          transition-timing-function: ease-in-out;
        }
        button.btn-primary:hover {
          width: 22em;
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
        table.table-bordered{
            border:1px solid black;
            margin-top:20px;
        }
        table.table-bordered > thead > tr > th{
            border:1px solid black;
        }
        table.table-bordered > tbody > tr > td{
          /* border:1px solid rgb(61, 204, 116); */
          border:1px solid black;
        }
        table th, table td{
        padding: 10px; /* Apply cell padding */
        text-align:center;
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
        <h3>Search Result</h3>

        <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Roll Number</label>
        <div class="col-sm-4">
            <input type='number' min=0 class="form-control student" name="student_id" placeholder="Enter the roll no of the student" required>
            <div class="invalid-tooltip">Please Enter the Valid Roll Number.</div>
        </div>
      </div>

      <div class="form-group row">
      <label for="add_subject" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-4">
          <button type="submit" name="search_result" class="btn btn-primary" value="search" >Search Result</button>
        </div>
      </div>

<?php
<<<<<<< HEAD
=======

>>>>>>> be24171 (README.md file committed!)
if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['search_result']))
{
  $student = test_input($_GET["student_id"]);
  //$exam = test_input($_GET["exam"]);
  
  /*To get the PRN from the roll_no*/
<<<<<<< HEAD
  
  $sql = "SELECT DISTINCT user.u_name, student.PRN, student.semester,course.c_name,student.course_id FROM user,student,course WHERE user.user_id = student.user_id AND course.course_id=student.course_id AND student.roll_no=$student AND student.dept_id=".$row['dept_id']; 
  $result = mysqli_query($connection,$sql);
  if(mysqli_num_rows($result)>0)
  {  
    $student_data = mysqli_fetch_assoc($result);
    /* $sql = "SELECT * from result WHERE PRN=".$student_data['PRN'];
    $result = mysqli_query($connection,$sql); */
    if($result)
    {?>
        <h3>Results</h3>
        <div class="table-responsive">
=======
  $result = mysqli_query($connection,"SELECT PRN from student where roll_no=$student");
  $PRN_data = mysqli_fetch_row($result);

  if(count($PRN_data)==1)
  {  
    $sql = "SELECT * from result WHERE PRN=$PRN_data[0]";
    $result = mysqli_query($connection,$sql);
    if($result)
    {?>
        
        <?php
        $sql = "SELECT DISTINCT user.u_name, student.semester,course.c_name FROM user,student,course WHERE user.user_id = student.user_id AND course.course_id=student.course_id AND student.PRN =".$PRN_data[0]." AND student.dept_id=".$row['dept_id']; 
        $result = mysqli_query($connection,$sql);
        if(mysqli_num_rows($result)==0)
        {?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong>&nbsp;&nbsp;Unknown student!
            </div>
        <?php die();}
        $student_data = mysqli_fetch_assoc($result);
        ?>
        <h3>Results</h3>
>>>>>>> be24171 (README.md file committed!)
        <table class="table table-hover table-bordered"style="text-align:center;">
        <tr>
          <thead>
            <th>Roll Number</th>
            <th>Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Subject</th>
            <th colspan="3">Exam</th>
            </thead>
        </tr> 
        <tr>
            <td><?php echo$student?></td>
            <td><?php echo$student_data['u_name']?></td>
            <td><?php echo$student_data['c_name']?></td>
            <td><?php echo$student_data['semester']?></td>
            <td>X</td>
            <td>CE-I</td>
            <td>CE-II</td>
            <td>ESE</td>
        </tr>
        <!-- Fine till here-->

        <?php
<<<<<<< HEAD
        $sql1 = "select * from subject where semester=".$student_data['semester']." and course_id=".$student_data['course_id'];
=======

        $sql1 = "select * from subject where semester=1 and course_id=1";
>>>>>>> be24171 (README.md file committed!)
        $result = mysqli_query($connection,$sql1);

        while($subject_row = mysqli_fetch_assoc($result))
        {
<<<<<<< HEAD
            $sql = "SELECT score FROM result,exam WHERE PRN=".$student_data['PRN']." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='CE_I'";
=======
            $sql = "select result.exam_id,score from result,exam where PRN=".$PRN_data[0]." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='CE_I'";
>>>>>>> be24171 (README.md file committed!)
            $result1 = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result1);
            echo"<tr>";
            echo"<td colspan='4'></td>";
            echo"<td>".$subject_row['sub_name']."</td>";
            echo"<td>".$row['score']."</td>";
            
<<<<<<< HEAD
            $sql = "SELECT result.score FROM result,exam WHERE PRN=".$student_data['PRN']." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='CE_II'";
=======
            $sql = "select result.exam_id,score from result,exam where PRN=".$PRN_data[0]." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='CE_II'";
>>>>>>> be24171 (README.md file committed!)
            $result1 = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result1);
            echo"<td>".$row['score']."</td>";

<<<<<<< HEAD
            $sql = "SELECT result.exam_id,score FROM result,exam WHERE PRN=".$student_data['PRN']." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='ESE'";
=======
            $sql = "select result.exam_id,score from result,exam where PRN=".$PRN_data[0]." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='ESE'";
>>>>>>> be24171 (README.md file committed!)
            $result1 = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result1);
            echo"<td>".$row['score']."</td>";
            echo"</tr>";
        }
<<<<<<< HEAD
      echo"</div>";
    }
  } 
=======
    }
  }
>>>>>>> be24171 (README.md file committed!)
  else
  {?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Unknown student!</strong>
    </div>
    <?php 
  }
}

function test_input($data) 
{
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