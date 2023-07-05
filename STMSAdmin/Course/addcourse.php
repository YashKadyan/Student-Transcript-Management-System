<?php
session_start();
// Database configuration 
/*$dbHost     = "localhost"; 
$dbUsername = "yash"; 
$dbPassword = "Yash@123"; 
$dbName     = "result"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName); 
 
// Check connection 
if ($db->connect_error) 
{ 
    die("Connection failed: " . $db->connect_error); 
}*/
require_once('../../Database/connection.php');
if(!isset($_SESSION['uid']))
{
  header("location:../../home.html");
  /*echo"<script>alert('Unauthorised access!!!');</script>";
  die();*/
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
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
          width: 8em;
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
                <span class="decorate"><a class="dropdown-item" href="coursereports.php"><i class="fa fa-file"></i>&nbsp;&nbsp;Course Reports</a></span>
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
    <h3>Add Course</h3>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(function() 
        {
            // Generic logic
            var toggleDropdown = function(clg) 
            {
                // hasOwner is a boolean store
                var hasClg = typeof clg !== typeof undefined && clg;

                // Use boolean to decide whether to disable/enable dep field
                $('#dep').prop('disabled', !hasClg).val('');
            }

            // Trigger logic when #clg is updated
            $('#clg').on('change', function() 
            {
                toggleDropdown($(this).val());
            });

            // Trigger logic on DOM ready
            toggleDropdown();
        });
     </script>
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
                      {  
                          echo '<option value="'.$new_row['college_id'].'">'.$new_row['college_name'].'</option>'; 
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
            <select name="dep" id="dep" class="form-control" style="position: relative; top: 1%; height: 100%;" required disabled>
              <option value="">Select Department</option>
            </select>
            <div class="invalid-tooltip">Please Select the Department Name!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="coursename" class="col-sm-2 col-form-label">Course Name</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Course Name" pattern="^(?=[a-zA-Z])[^\d]+$" value="" required>
            <div class="invalid-tooltip">Please Enter the Course Name!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="courseduration" class="col-sm-2 col-form-label">Course Duration</label>
        <div class="col-sm-5">
            <input type="number" class="form-control" id="cduration" name="cduration" placeholder="Enter Course Duration in Years" pattern="^\d{1,}$" value="" required>
            <div class="invalid-tooltip">Please Enter the Course Duration!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="coursedescription" class="col-sm-2 col-form-label">Course Description</label>
        <div class="col-sm-5">
        <textarea class="form-control" id="cdescription" rows="4" name="cdescription" placeholder="Enter the Course Description" maxlength="250" required></textarea>
          <div class="invalid-tooltip">Please Enter the Course Description!</div>
        </div>
      </div>
      <div class="form-group row">
      <label for="add" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-3">
          <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <?php
        if(isset($_POST['Submit']))
        {
          $new_sql="SELECT COUNT(c_name) from course where c_name='".$cname."' and dept_id='".$Deptid."'";
          $new_result=mysqli_query($connection, $new_sql);
          $new_row=mysqli_fetch_row($new_result);
          if($new_row[0]==0)
          {

            $new_sql="INSERT INTO course(c_name,c_duration,c_description,dept_id) VALUES('".$cname."',$cduration,'".$cdescription."',$Deptid)";
            if(mysqli_query($connection, $new_sql))
            {?>
                <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Course added successfully!
                <?php header("refresh:0");?>  
                </div>
            <?php
            }
            else
            {?>
                <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong>
                Course could not be inserted!<?php echo mysqli_error($connection);?>
              </div> 
            <?php
            }
          }
          else
          {?>
              <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Error!</strong> Course already exists!
            </div>
          <?php
          }
        } 
      ?>
    </form>
    </body>
</html>
