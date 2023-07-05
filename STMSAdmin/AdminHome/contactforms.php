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

$contact_result = mysqli_query($connection,"SELECT * FROM contact_form ORDER BY date");
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
          width: 80%;
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
        <h3>Contact Form Submissions</h3>
        <div class="table-responsive">
            <table class='table table-hover table-bordered'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Message</th>    
                        <th>Submitted on</th>
                        <th>Mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($record = mysqli_fetch_assoc($contact_result))
                    {
                        echo"<tr>";
                        echo"<td>".$record['name']."</td>";
                        echo"<td>".$record['sub']."</td>";
                        echo"<td>".$record['msg']."</td>";
                        $date = new DateTime($record['date']);
                        echo"<td>".$date->format('m/d/Y h:ia')."</td>";
                        echo"<td><a target='_blank' href='https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&to=".$record['mail']."&su=Re:". str_replace(' ','%20',$record['sub'])."&body=".str_replace(' ','%20','Hi there!%0AThank you for reaching out to us...')."'>".$record['mail']."</td>";
                        echo"</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
    </body>
</html> 