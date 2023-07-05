<?php
session_start();
require('../Database/connection.php');

if(!isset($_SESSION['uid']))
{
  echo"<script>alert('Unauthorised access!!!');</script>";
  die();
}
if(!isset($_SESSION['name']) || !isset($_SESSION['photo']))
{
  $sql = "select u_name,photo_path from user where user_id='".$_SESSION['uid']."'";
  $result = mysqli_query($connection,$sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['name'] = $row['u_name'];
  $_SESSION['photo'] = $row['photo_path'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>     
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
          background-color: whitesmoke;
          background-size: cover;
          background-repeat: no-repeat;
        }
        .card {
          background-color: #21d190;
          width: 14%;
          height: 190px;
          border-radius: 50%;
          text-align:center;
          margin: 1%; 
          position:-webkit-sticky;
          
        }
        .card-title{
          padding: 27%; 
          font-size: larger;
          text-decoration: none;
        }
        a.stretched-link{
          text-decoration: none;
          color: #000;
        }
        div.card :hover {
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          border-radius: inherit;
          color: whitesmoke;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          }
</style>
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
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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

      <div class="container-fluid row"> 
        <div class="card" >
          <div class="card-body">
            <a class="stretched-link" href="addsubject.php"><h6 class="card-title">Add Subject</h6></a>
          </div>
        </div>
        <div class="card" >
          <div class="card-body">
            <a class="stretched-link" href="subjectreport.php"><h6 class="card-title">Subject Report</h6></a>
          </div>
        </div>
        <div class="card" >
          <div class="card-body">
            <a class="stretched-link" href="studentreport.php"><h6 class="card-title">Student Report</h6></a>
          </div>
        </div>
        <div class="card" >
          <div class="card-body">
            <a class="stretched-link" href="searchresult.php"><h6 class="card-title" >Search Result</h6></a>
          </div>
        </div>
        <!-- <div class="card" >
          <div class="card-body">
            <a class="stretched-link" href="addmarks.php?exam_type=CE-I"><h6 class="card-title">Add Marks of CE-I</h6></a>
          </div>
        </div> -->
        <div class="card" >
          <div class="card-body">
            <a class="stretched-link" href="account.php"><h6 class="card-title">My Account</h6></a>
          </div>
        </div>
        <div class="card" >
          <div class="card-body">
            <a class="stretched-link" href="logout.php"><h6 class="card-title">Logout</h6></a>
          </div>
        </div>
      </div>
  
</body>    
</html>