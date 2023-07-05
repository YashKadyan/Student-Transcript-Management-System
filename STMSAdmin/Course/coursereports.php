<?php
session_start();
require_once('../../Database/connection.php');
if(!isset($_SESSION['uid']))
{
  header("location:../../home.html");
}
$sql = "select * from user where user_id='".$_SESSION['uid']."'";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['u_name'];
$photo = $row['photo_path'];
$gender = $row['gender'];
$dob = $row['dob'];
$address = $row['address'];
$email = $row['email'];
$phone_no = $row['phone_no'];

$cname=$_POST['cname'];
$cduration=$_POST['cduration'];
$cdescription=$_POST['cdescription'];
$Clgid=$_POST['clg'];
$Deptid=$_POST['dep'];
$_SESSION['cg']=$Clgid;
$_SESSION['dp']=$Deptid;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Reports</title>
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
        
        body{
          margin: 5%; /*5% margin from all the sides of the html page */ 
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;
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
          /*width: 24.5em;*/
          width: 12em;
          border: none;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size:16px;
          margin:4px 2px;
          cursor:pointer;
          transition-duration: 0.4s;
          transition: all 1s;
          transition-timing-function: ease-in-out;
        }
        button.btn-primary:hover 
        {
          width: 21em;
          box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
        h3 
        {
            font-size: 32px;
            /* background: -webkit-linear-gradient(#eee, #333); */
            background: -webkit-linear-gradient(#21d190, #d65bca);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }
        button.btn-lg
        {
          color: whitesmoke;
          border: none;
        }
        table.table-bordered
        {
          border:1px solid black;
          margin-top:20px;
        }
        table.table-bordered > thead > tr > th
        {
          border:1px solid black;
        }
        table.table-bordered > tbody > tr > td
        {
          border:1px solid black;
        }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
      (function () 
      {  
            'use strict';  
            window.addEventListener('load', function () 
            {  
                var form = document.getElementById('needs-validation');
                form.addEventListener('submit', function (event)
                {  
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
  <script>
      $(document).ready(function()
      {
          $('#clg').on('change', function()
          {
              var clgid = $(this).val();
              if(clgid)
              {
                  $.ajax(
                  {
                      type:'POST',
                      url:'ajaxCourse.php',
                      data:'college_id='+clgid,
                      success:function(html)
                      {
                          $('#dep').html(html);
                      }
                  }); 
              }
              else
              {
                  $('#dep').html('<option value="">Select Department</option>');
              }
           });
  
           $('#dep').on('change', function()
           {
                var dep = $(this).val();
                if(dep)
                {
                    $.ajax(
                    {
                        type:'POST',
                        url:'ajaxCourse.php',
                        data:'dept_id='+dep,
                        success:function(html)
                        {

                        }
                    }); 
                }
            });
        });
  </script>
  </head>     
  <body>
    <nav class="navbar py-3 navbar-expand-sm bg-dark navbar-dark fixed-top">
        <!-- Brand -->
        <a class="navbar-brand" href="#">STMS</a>
      
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../AdminHome/AdminHome.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;College&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:8.2%;margin-top:-1.1%;">
                <span class="decorate"><a class="dropdown-item" href="../College/addcollege.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add College</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Departments&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:13.94%;margin-top:-1.1%;">
                <span class="decorate"><a class="dropdown-item" href="../Department/adddepartment.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Department</a></span>
                <span class="decorate"><a class="dropdown-item" href="../Department/departmentreports.php"><i class="fa fa-file"></i>&nbsp;&nbsp;Department Reports</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Courses&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:21.74%;margin-top:-1.1%;">
                <span class="decorate"><a class="dropdown-item" href="addcourse.php"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Course</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Students&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:27.74%;margin-top:-1.1%;">
                <span class="decorate"><a class="dropdown-item" href="../Student/addstudent.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Student</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Faculty&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:34%;margin-top:-1.1%;">
                <span class="decorate"><a class="dropdown-item" href="../Faculty/addfaculty.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Faculty</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Admin&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:39.6%;margin-top:-1.1%;">
                <span class="decorate"><a class="dropdown-item" href="../Admin/addadmin.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Admin</a></span>
              </div>
          </li>
        </ul>
        <ul class="navbar-nav dropdown ml-auto">
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                <img src="<?php echo$photo;?>" width="35px" height="35px" style="border-radius:50%;"/>&nbsp;&nbsp;Welcome&nbsp;<?php $_SESSION['name']=$name; echo$_SESSION['name'];?>&nbsp;!
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <span class="decorate"><a class="dropdown-item" href="../Profile/myaccount.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a></span>
                <span class="decorate"><a class="dropdown-item" href="../Profile/logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log out</a></span>
              </div>
            </li>
        </ul>
    </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="center" novalidate id="needs-validation" enctype="multipart/form-data">
    <h3>Course Reports</h3>
      <div class="form-group row">
        <label for="clgname" class="col-sm-2 col-form-label">College Name</label>
        <div class="col-sm-5">
          <select name="clg" id="clg" style="position: relative; top: 3%; height: 100%;" class="form-control" required>
              <option value="">Select College</option>
              <?php
                  $new_sql=mysqli_query($connection, "SELECT * FROM college"); 
                  $new_row=mysqli_num_rows($new_sql);
                  if($new_row > 0)
                  { 
                      while($new_row = mysqli_fetch_array($new_sql))
                      {  ?>
                          <option value="<?php echo$new_row['college_id'];?>" <?php echo (isset($_POST['clg']) && $_POST['clg'] === $new_row['college_id']) ? 'selected' : ''; ?>><?php echo$new_row['college_name'];?></option> 
                       <?php
                      }
                  }
                  else
                  { 
                      echo '<option value="">College not available</option>'; 
                  }
              ?>
            </select>
            <div class="invalid-tooltip">Please Select the College Name!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="depname" class="col-sm-2 col-form-label">Department Name</label>
        <div class="col-sm-5">
            <select name="dep" id="dep" class="form-control" style="position: relative; top: 1%; height: 100%;" required>
              <option value="">Select Department</option>
              <?php
                  $new_sql=mysqli_query($connection, "SELECT * FROM department WHERE college_id = ".$_POST['clg'].""); 
                  $new_row=mysqli_num_rows($new_sql);
                  if($new_row > 0)
                  { 
                      while($new_row = mysqli_fetch_array($new_sql))
                      {  ?>
                          <option value="<?php echo$new_row['dept_id'];?>" <?php echo (isset($_POST['dep']) && $_POST['dep'] === $new_row['dept_id']) ? 'selected' : ''; ?>><?php echo$new_row['dept_name'];?></option> 
                       <?php
                      }
                  }
                  else
                  { 
                      echo '<option value="">College not available</option>'; 
                  }
              ?>
            </select>
            <div class="invalid-tooltip">Please Select the Department Name!</div>
        </div>
      </div>
      <div class="form-group row">
      <label for="add" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-3">
          <button type="submit" name="report" class="btn btn-primary" style="background-image:linear-gradient(315deg, #21d190 0%, #d65bca 74%);">Generate Report</button>
        </div>
      </div>
      <?php
        if(isset($_POST['report']))
        {
          ?>
          <a href="coursepdf.php" class="btn btn-primary btn-lg" target="_blank">Click Here to Download Report!</a>
          <table class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th scope="col">Course Name</th>
                      <th scope="col">Course Duration</th>
                      <th scope="col">Course Description</th>
                      <th scope="col">No. of Students</th>
                      <th scope="col">No. of Subjects</th>
                      <th scope="col">No. of Faculties</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      $res = mysqli_query($connection,"SELECT college_name,dept_name FROM college,department WHERE college.college_id=department.college_id AND department.dept_id in(SELECT dept_id FROM department WHERE college.college_id=$cid)");
                      $result = mysqli_fetch_assoc($res);

                      $dres = mysqli_query($connection,"SELECT * FROM course WHERE dept_id=$Deptid");
                      $cnt=mysqli_num_rows($dres);
                      if($cnt)
                      {
                          while($course_data = mysqli_fetch_assoc($dres))
                          {
                              echo"<tr>";
                                  echo"<td>".$course_data['c_name']."</td>";
                                  echo"<td>".$course_data['c_duration']." years"."</td>";  
                                  echo"<td>".$course_data['c_description']."</td>";

                                  $sql = "SELECT count(PRN) FROM student WHERE college_id=$Clgid AND dept_id=$Deptid AND course_id=".$course_data['course_id'];
                                  $courseid=$course_data['course_id'];
                                  $course_result = mysqli_query($connection,$sql);
                                  $course_data = mysqli_fetch_row($course_result);
                                  echo"<td>".$course_data[0]."</td>";

                                  $stdsql = "SELECT count(sub_id) FROM subject WHERE course_id=$courseid";
                                  $course_result = mysqli_query($connection,$stdsql);
                                  $course_data = mysqli_fetch_row($course_result);
                                  echo"<td>".$course_data[0]."</td>";

                                  $cres = mysqli_query($connection,"SELECT count(faculty_id) FROM faculty WHERE college_id=$Clgid and dept_id=$Deptid ");
                                  $fcount = mysqli_fetch_array($cres);
                                  echo"<td>".$fcount[0]."</td>";
                              echo"</tr>";
                          }
                      }
                      else
                      {
                          echo "No Course Available!";
                      }
                  ?>
              </tbody>
          </table>
        <?php
        } 
      ?>
    </form>
    </body>
</html>