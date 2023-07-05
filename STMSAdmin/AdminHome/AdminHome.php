<?php
session_start();
require_once('../../Database/connection.php');
if(!isset($_SESSION['uid']))
{
    /*echo"<script>alert('Unauthorised access!!!');</script>";*/
    header("location:../../home.html");
  /*die();*/
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <!--<link rel="stylesheet" href="style2.css">-->
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <!--<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>-->
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
        h1 
        {
            font-size: 35px;
            /* background: -webkit-linear-gradient(#eee, #333); */
           /*background: -webkit-linear-gradient(#21d190, #d65bca);*/
           background:#fff;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }
        a,a:hover,a:focus 
        {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }
        .navbar 
        {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        .navbar-btn 
        {
            box-shadow: none;
            outline: none !important;
            border: none;
        }
        /* ---------------------------------------------------
        SIDEBAR STYLE
        ----------------------------------------------------- */
        .wrapper 
        {
            display: flex;
            width: 100%;
        }
        #sidebar 
        {
            width: 250px;
            position: fixed;
            top: 10%;
            left: 0;
            height: 100vh;
            z-index: 999;
            background: #7386D5;
            color: #fff;
            transition: all 0.3s;
        }
        #sidebar.active 
        {
            margin-left: -250px;
        }
        #sidebar .sidebar-header 
        {
            padding: 20px;
            background: #6d7fcc;
        }
        #sidebar ul.components 
        {
            padding: 20px 0;
            /*border-bottom: 1px solid #47748b;*/
        }
        #sidebar ul p 
        {
            color: #fff;
            padding: 10px;
        }
        #sidebar ul li a 
        {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }
        #sidebar ul li a:hover 
        {
            color: #fff;/*#7386D5;*/
            /*background: #fff;*/
            background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
        }
        #sidebar ul li.active>a, #sidebar a[aria-expanded="true"]
        {
            color: #fff;
            background: #6d7fcc;
        }
        a[data-toggle="collapse"] 
        {
            position: relative;
        }
        .s .dropdown-toggle::after 
        {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }
        ul ul a 
        {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }
        /* ---------------------------------------------------
        CONTENT STYLE
        ----------------------------------------------------- */
        #content 
        {
            width: calc(100% - 250px);
            padding: 40px;
            min-height: 100vh;
            transition: all 0.3s;
            position: absolute;
            top: 0;
            right: 0;
        }
        #content.active 
        {
            width: 100%;
        }
        /* ---------------------------------------------------
        MEDIAQUERIES
        ----------------------------------------------------- */
        @media (max-width: 768px) 
        {
            #sidebar 
            {
                margin-left: -250px;
            }
            #sidebar.active 
            {
                margin-left: 0;
            }
            #content 
            {
                width: 100%;
            }
            #content.active 
            {
                width: calc(100% - 250px);
            }
            #sidebarCollapse span 
            {
                display: none;
            }
        }
        /* ---------------------------------------------------
        CIRCLES WITH BOXES
        ----------------------------------------------------- */
        .newwrapper
        {
	        display:grid;
            grid-gap:33px;
            grid-template-columns: repeat(auto-fit, minmax(140px,1fr));
            /*border:1px solid blue;*/
            position:absolute;
            top:20%;
            width:70%;
        }
        #circle 
        {
            /*width: 9rem;
            height: 9rem;*/
            background-color:#FF0099;
            border-radius: 50%
        }
        div.square 
        {
  	        border: solid 3px #FF0099;
  	        width: 10rem;
  	        height: 10rem;
            
        }
        svg:hover circle
        {
            fill:#21d190;
        }
  </style>
  </head>     
  <body>
    <nav class="navbar py-3 navbar-expand-sm bg-dark navbar-dark fixed-top">
        <!-- Brand -->
        <a class="navbar-brand" href="#">STMS</a>
      
        <!-- Links -->
        <!--<ul class="navbar-nav">
          
        </ul>-->
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
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>Admin Panel</h1>
            </div>

            <ul class="list-unstyled components">
                <p>DASHBOARD</p>
                <li>
                	<div class="s">
                    <a href="#collegeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">College</a>
                    <ul class="collapse list-unstyled" id="collegeSubmenu">
                        <li>
                            <a href="../College/addcollege.php">Add College</a>
                        </li>
                    </ul>
                  </div>
                </li>
                <li>
                	<div class="s">
                    <a href="#departmentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Department</a>
                    <ul class="collapse list-unstyled" id="departmentSubmenu">
                        <li>
                            <a href="../Department/adddepartment.php">Add Department</a>
                        </li>
                        <li>
                            <a href="../Department/departmentreports.php">Department Reports</a>
                        </li>
                    </ul>
                  </div>
                </li>
                <li>
                	<div class="s">
                    <a href="#courseSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Course</a>
                    <ul class="collapse list-unstyled" id="courseSubmenu">
                        <li>
                            <a href="../Course/addcourse.php">Add Course</a>
                        </li>
                        <li>
                            <a href="../Course/coursereports.php">Course Reports</a>
                        </li>
                    </ul>
                  </div>
                </li>
                <li>
                	<div class="s">
                    <a href="#studentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Student</a>
                    <ul class="collapse list-unstyled" id="studentSubmenu">
                        <li>
                            <a href="../Student/addstudent.php">Add Student</a>
                        </li>
                    </ul>
                  </div>
                </li>
                <li>
                	<div class="s">
                    <a href="#facultySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Faculty</a>
                    <ul class="collapse list-unstyled" id="facultySubmenu">
                        <li>
                            <a href="../Faculty/addfaculty.php">Add Faculty</a>
                        </li>
                    </ul>
                    </div>
                </li>

                <li>
                	<div class="s">
                    <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin</a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li>
                            <a href="../Admin/addadmin.php">Add Admin</a>
                        </li>
                        <li>
                            <a href="../AdminHome/contactforms.php">Contact Forms</a>
                        </li>
                    </ul>
                    </div>
                </li>
                <li>
                	<div class="s">
                    <a href="#myaccountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">My Account</a>
                    <ul class="collapse list-unstyled" id="myaccountSubmenu">
                        <li>
                            <a href="../Profile/myaccount.php">My Profile</a>
                        </li>
                        <li>
                            <a href="../Profile/logout.php">Logout</a>
                        </li>
                    </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <button type="button" id="sidebarCollapse" class="btn btn-info" style="position:absolute;top:12%;left:1%;height:4%;width:auto;">
                <i class="fa fa-bars" style="font-size:140%;position:absolute;top:15%;left:6%;"></i>
                <span style="position:absolute;top:0.25em;left: 2.5em;"></span>
            </button>
            <div class="newwrapper">
                <div class="square">
                    <svg xmlns="http://www.w3.org/2000/svg" width="153" height="153">
                        <a href="../College/addcollege.php">
                            <circle cx="77" cy="77" r="75" fill="#FF0099" />
                        </a>
                        <a href="../College/addcollege.php" style="font-size: 24px;">
                            <text x="75" y="65" text-anchor="middle" fill="#fff">
                                Add<tspan dx="-60" dy="25">College</tspan>
                            </text>
                        </a>
                    </svg>
                </div>
                <div class="square">
                    <svg xmlns="http://www.w3.org/2000/svg" width="153" height="153">
                        <a href="../Department/adddepartment.php">
                            <circle cx="77" cy="77" r="75" fill="#FF0099" />
                        </a>
                        <a href="../Department/adddepartment.php" style="font-size: 24px;">
                            <text x="85" y="65" text-anchor="middle" fill="#fff">
                                Add <tspan dx="-85" dy="25">Department</tspan>
                            </text>
                        </a>
                    </svg>
                </div>
                <div class="square">
                    <svg xmlns="http://www.w3.org/2000/svg" width="153" height="153">
                        <a href="../Course/addcourse.php">
                            <circle cx="77" cy="77" r="75" fill="#FF0099" />
                        </a>
                        <a href="../Course/addcourse.php" style="font-size: 24px;">
                            <text x="75" y="65" text-anchor="middle" fill="#fff">
                                Add<tspan dx="-60" dy="25">Course</tspan>
                            </text>
                        </a>
                    </svg>
                </div>
                <div class="square">
                    <svg xmlns="http://www.w3.org/2000/svg" width="153" height="153">
                        <a href="../Admin/addadmin.php">
                            <circle cx="77" cy="77" r="75" fill="#FF0099" />
                        </a>
                        <a href="../Admin/addadmin.php" style="font-size: 24px;">
                            <text x="85" y="65" text-anchor="middle" fill="#fff">
                                Add<tspan dx="-55" dy="25">Admin</tspan>
                            </text>
                        </a>
                    </svg>
                </div>
                <div class="square">
                    <svg xmlns="http://www.w3.org/2000/svg" width="153" height="153">
                        <a href="../Course/addcourse.php">
                            <circle cx="77" cy="77" r="75" fill="#FF0099" />
                        </a>
                        <a href="../Department/departmentreports.php" style="font-size: 24px;">
                            <text x="75" y="65" text-anchor="middle" fill="#fff">
                                Department<tspan dx="-100" dy="25">Reports</tspan>
                            </text>
                        </a>
                    </svg>
                </div>
                <div class="square">
                    <svg xmlns="http://www.w3.org/2000/svg" width="153" height="153">
                        <a href="../Course/coursereports.php">
                            <circle cx="77" cy="77" r="75" fill="#FF0099" />
                        </a>
                        <a href="../Course/coursereports.php" style="font-size: 24px;">
                            <text x="77" y="65" text-anchor="middle" fill="#fff">
                                Course<tspan dx="-81" dy="25">Reports</tspan>
                            </text>
                        </a>
                    </svg>
                </div>
                <div class="square">
                    <svg xmlns="http://www.w3.org/2000/svg" width="153" height="153">
                        <a href="../Profile/myaccount.php">
                            <circle cx="77" cy="77" r="75" fill="#FF0099" />
                        </a>
                        <a href="../Profile/myaccount.php" style="font-size: 24px;">
                            <text x="75" y="65" text-anchor="middle" fill="#fff">
                                My<tspan dx="-60" dy="25">Account</tspan>
                            </text>
                        </a>
                    </svg>
                </div>
                <div class="square">
                    <svg xmlns="http://www.w3.org/2000/svg" width="153" height="153">
                        <a href="../Profile/logout.php">
                            <circle cx="77" cy="77" r="75" fill="#FF0099" />
                        </a>
                        <a href="../Profile/logout.php" style="font-size: 24px;">
                            <text x="77" y="77" text-anchor="middle" fill="#fff">
                                Logout
                            </text>
                        </a>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>-->
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar,#content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
  </body>
</html>  