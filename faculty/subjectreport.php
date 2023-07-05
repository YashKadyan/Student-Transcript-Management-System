<?php
session_start();
require_once('../Database/connection.php');

if(!isset($_SESSION['uid']))
{
  echo"<script>alert('Unauthorised access!!!');</script>";
  die();
}
$sql = "select department.dept_name,course.course_id,course.c_name,faculty.faculty_id from course,department,faculty where department.dept_id = faculty.dept_id and course.dept_id = department.dept_id and faculty.user_id = ".$_SESSION['uid'];
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);

$sql = "SELECT exam_id, exam_name,descr,total_marks FROM exam where exam_id>2";  
$result1 = mysqli_query($connection,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Report</title>
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
          /* background-repeat: no-repeat; */
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
          width: 10em;
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
          width: 21em;
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

          $(".sem").change(function(){
            //alert("course: " + $(".course").val());
            $(".subject").load("demo_test_post.php",
            {
              cid: $(".course").val(),
              fid: <?php echo$row['faculty_id']?>,
              sem: $(".sem").val()
            } /* ,
            function(data,status){
              alert("Data: " + data);
            }  */);

            $(".subject").html("<option value=''>Select Subject</option>"); 
            if ($(".course").val()==='' || $(".sem").val()=='') {
              //alert('nothing!');
              $(".student").html("<option value=''>No students</option>"); 
            }
            else {
              $('.student').load("demo_test_post.php",
              {
                cid: $(".course").val(),
                sem: $(".sem").val()
              } /* ,
              function(data,status) {
                alert(status);
              }  */);
            }
          });


          $(".exam").change(function(){
            //alert("course: " + $(".course").val());
            $('.obtained_marks').val('');
            $("#total_marks").load("demo_test_post.php",
            {
              eid: $(".exam").val()
            } ,
            function(data,status){
              //alert("\nStatus: " + status);
              $("#total_marks").val(data);
              marks = data.split(' ');
              $('.obtained_marks').attr('max',marks[0]);
            } );
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
              <img src="<?php echo$_SESSION['photo'];?>" width="30px" height="30px" style="border-radius:50%;"/>&nbsp;&nbsp;
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
      
      <h3>Subject Report</h3>
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
            <!-- <div class="invalid-tooltip">Please select the Semester.</div> -->
        </div>
      </div>

      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Subject</label>
        <div class="col-sm-5">
          <select class="custom-select subject" name="subject" required>
            <option value="">Select Subject </option>
          </select>
            <div class="invalid-tooltip">Please select the Subject.</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="Exam" class="col-sm-2 col-form-label">Exam</label>
        <div class="col-sm-3">
            <select class="custom-select exam" name="exam" required>
              <option value="">Select Exam</option>
              <?php 
                while($exam = mysqli_fetch_assoc($result1))
                {?>
                  <option value="<?php echo$exam['exam_id'] ?>"><?php echo$exam['exam_name']?></option>
                <?php
                }?>
            </select>
          </div>
          <div class="invalid-tooltip">Please select the Exam.</div>
          <div class="col-sm-2">
            <input type="text" class="form-control total_marks" disabled name="total_marks" id="total_marks" placeholder="Total marks"/>
          </div>
      </div>
      
      <div class="form-group row">
      <label for="add_subject" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-3">
          <button type="submit" name="action" class="btn btn-primary" value="view" >View Report</button>
        </div>
        <!-- <div class="col-sm-3">
          <button type="submit" name="action" class="btn btn-primary" value="download" >Download Report</button>
        </div> -->
      </div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['action']))
{
  $cid = test_input($_GET["course"]);
  $sem = test_input($_GET["sem"]);
  $subject = test_input($_GET["subject"]);
  $exam = test_input($_GET["exam"]);
  ?>
  <hr>
  <style>
    .fa-download {
      background-color: DodgerBlue;
      border: none;
      color: white;
      padding: 12px 30px;
      cursor: pointer;
    } 
  </style>
  <a download='subject_report' class="btn btn-primary fa fa-download" role="button" href="generatepdf.php?course=<?php echo$cid?>&sem=<?php echo$sem?>&subject=<?php echo$subject?>&exam=<?php echo$exam?>" target="_blank">&nbsp;Click Here to download the report</a>
  <?php
  if(strcmp($_REQUEST['action'],"view")==0)
  {
    $sql = "SELECT u_name,PRN,roll_no FROM user,student WHERE user.user_id = student.user_id AND semester=$sem AND course_id=$cid ORDER BY roll_no ASC";
    $res = mysqli_query($connection,$sql);
    
    $res2 = mysqli_query($connection,"SELECT sub_name FROM subject WHERE semester=$sem AND course_id=$cid AND sub_id=$subject");
    $subject_result = mysqli_fetch_assoc($res2);

    $res3 = mysqli_query($connection,"SELECT exam_name,total_marks FROM exam where exam_id=$exam");
    $result = mysqli_fetch_assoc($res3);
    if($res) {?>
      <br><br>
      <table border="1px" style="padding: 5px">
        <tr>
          <th>Subject</th>
          <th>Exam</th>
          <th>Total Marks</th>
        </tr>
        <tr>
          <td><?php echo$subject_result['sub_name']?></td>
          <td><?php echo$result['exam_name']?></td>
          <td><?php echo$result['total_marks']?></td>
        </tr>
      </table>
      <br>
      <table class="table table-hover table-bordered">
      <thead>
          <tr>
          <th>Roll No</th>
          <th>Name</th>
          <th>Marks</th>
          <th colspan="3"> Marks uploaded on</th>
          </tr>
      </thead>
      <tbody>
      <?php 
      if((mysqli_num_rows($res)>0))
      {
        while($student_data = mysqli_fetch_assoc($res)) 
        {
          $res1 = mysqli_query($connection,"SELECT score,uploaded_on FROM result WHERE PRN=".$student_data['PRN']." AND sub_id=$subject AND exam_id=$exam");
          $exam_result = mysqli_fetch_assoc($res1);
          
          echo"<tr>";
          echo"<td>".$student_data['roll_no']."</td>";
          echo"<td>".$student_data['u_name']."</td>";
          echo"<td>".$exam_result['score']."</td>";
          $date = new DateTime($exam_result['uploaded_on']);
          echo"<td>".$date->format('m/d/Y h:ia')."</td>";
          echo"</tr>";
        }
        echo"</tbody></table>";
      }
      else
      {
        echo"<h4 style='text-align:center'>No Records found";
      }
    }
  }
  unset($_GET['action']);
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