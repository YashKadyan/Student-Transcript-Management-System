<?php
session_start();
$connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}
if(!isset($_SESSION['uid']))
{
    /*echo"<script>alert('Unauthorised access!!!');</script>";*/
    header("location:/result/Home/home.html");
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
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  <!-- For importing the 3 bar icon in the main navbar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   <!-- For importing the caret-down icon using font-awesome -->

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <style>
        /* Top Main Navbar, Background and Sidebar Dropdown Menu */
        body
        {
            margin: -1px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #F0F0F0;            
        }
        /* Top Main Navbar */
        .topnav
        {
            background-color: #00CC00;
            height: 60px;
            margin-left: -1px;
            margin-right: -1px;
        }
        /* Sidebar Dropdown Menu */
        a   /* To remove the underlines from the links */
        {
            text-decoration: none;
        }
        li  /* To remove the bullets from the links */
        {
            list-style: none;
        }
        *   /* Apply to all elements in the page (Universal Selector) */
        {   
            padding:0;
            margin: 1px;
        }
        .main-nav   /* Adjust the width and background color of sidebar navigation menu to light blue */
        {
            width: 250px;
            background-color: #0000CC;
            margin-top: 0;
            margin-left: 0;
            height: auto;
        }
        .main-nav a     /* Apply styling to the links in Sidebar navigation with Bottom Border */
        {
            color: #FFF;
            display: block;
            padding: 16px 3px 16px 53px;
            letter-spacing: .1em;
            border-bottom: 1px solid white;
            width: 210px;
            margin: 0 -1em;
            font-size: 17px;
            transition: all 0.5s ease-in-out;       /* For Animation */
        }
        .main-nav a:hover, ul li:hover>a        /* Keep the background color of parent menu as selected while hovering over its submenu items */
        {   /* Change the background color of menu and at the same time keep the changed background for its submenu items when hovered upon */
            background: #0099FF;
        }
        .main-nav-ul ul     /* Hide the submenu items of all menus before hovering on the menus of those submenu items */
        {
            display: none;
        }
        .main-nav-ul li:hover ul    /* Show the submenu items of that menu which is hovered */
        {
            display: block;
        }
        .main-nav .sub-arrow1:after, .sub-arrow2:after, .sub-arrow3:after, .sub-arrow4:after, .sub-arrow5:after, .sub-arrow6:after, .sub-arrow7:after   /* Assign the code for right arrow and push it towards right and adjust its position in the menu */
        {
            content: '\203A';
            float: right;
            margin-right: 20px;
            margin-top: 11px;
            position: relative;
            right: -28px;
        }
        .main-nav li:hover .sub-arrow1:after, .main-nav li:hover .sub-arrow2:after, .main-nav li:hover .sub-arrow3:after, .main-nav li:hover .sub-arrow4:after, .main-nav li:hover .sub-arrow5:after, .main-nav li:hover .sub-arrow6:after, .main-nav li:hover .sub-arrow7:after    /* Rotate the right arrow clockwise by 90 degrees downwards */
        {
            transform: rotate(90deg);
        }
        label.logo1     /* Give styling to the first label and adjust its position */
        {
            color: #3300CC;
            font-size: 35px;
            line-height: 48px;
            padding: 4px 30px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        label.logo2     /* Give styling to the second label and adjust its position */
        {
            color: red;
            font-size: 35px;
            line-height: 48px;
            padding: 4px 0;
            margin-left:-20px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .flex-container>div     /* This defines a flex container. It may be inline or block depending on the given value. It enables a flex context for all its direct children */
		{
			padding: 5px;
            display: flex;      /* Displays an element as a block-level (one below the other) flex container */
		}
        .panel      /* Create a blank panel to cover the extra blank space left after the last menu and submenu link and give it the same color as that of the unselected menu links */
        {
            background-color: #0000CC;
            height: 292px;
            width: 220px;
            margin: 4px;
        }
        .b:hover
        {
            background-image:linear-gradient(315deg, #21d190 0%, #d65bca 74%);
        }
        .dropbtn 
        {
            background-color: #00CC00;
            color: white;
            padding: 10px;
            font-size: 25px;
            border: none;
            cursor: pointer;
            position: relative;
            top:3px;
            left: 400%;
            border-radius: 3px;
            display:block;
            width:100%;
        }
        .dropbtn:hover, .dropbtn:focus 
        {
            background-image:linear-gradient(315deg, #21d190 0%, #d65bca 74%);
        }
        .dropdown 
        {
            position: relative;
            display: inline-block;
        }
        .dropdown-content 
        {
            display: none;
            background-color: #66FF66;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 3px;
            position:relative;
            top: 3px;
            left:423%;
            width:20px;
            height: -100%;
            padding-bottom: 0;
        }
        .dropdown-content a 
        {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-radius: 3px;
        }
        ul.mainmenu li:hover>a, span.decorate:hover>a
        {
            background-image:linear-gradient(315deg, #21d190 0%, #d65bca 74%);
        }
        .show 
        {
            display: block;
            margin-top: 3px;
        }
    </style>
</head>
<body>
  <div class="flex-container">
    <div class="topnav">
        <i class="material-icons" style="margin-left: 10px; margin-top: 10px; font-size: 2.40em; color:white;">menu</i> <!-- menu is given as it is used for displaying the 3 bars icon on main navbar -->
        <label class="logo1">RESULT MANAGEMENT</label>
        <label class="logo2">ADMIN</label>
        <div class="dropdown">
        <ul class="mainmenu">
        <li>
            <a class="dropbtn"> 
                <label style="position:absolute; top:-3px; left:-8em;height:51px;width: 266px;"><img class="image" src="<?php echo$photo;?>" width="35px" height="35px" style="border-radius:50%;position:relative; top:8px;left:2%;border:1px solid white;"/></label>&nbsp;&nbsp;<label class="welcome" style="font-size:medium; position:relative; top:-2px; left:-10%;">Welcome&nbsp;<?php $_SESSION['name']=$name; echo$_SESSION['name'];?>&nbsp;!</label>
                <i class="fa fa-caret-down" style="position:relative; top:0px; left:10%;"></i>
            </a>
            <div id="myDropdown" class="dropdown-content">
                <span class="decorate"><a class="dropdown-item" style="position:relative; top:-4px; left: -1px;width:80%;height:20px;" href="account.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a></span>
                <span class="decorate"><a class="dropdown-item" style="position:relative; top:-15px;left:-1px; width:80%;margin-bottom:-18px;" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log out</a></span>
            </div>
        </li>
        </ul>
        </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropbtn");
    var i;

    for (i = 0; i < dropdown.length; i++) 
    {
        dropdown[i].addEventListener("click", function() 
        {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") 
            {
                dropdownContent.style.display = "none";
            }
            else if(dropdownContent)
            {
                dropdownContent.style.display = "block";
            }
        });
    }
    $(document).ready(function()
    {
        // Show hide popover
        $(".dropbtn").click(function()
        {
            $(this).find(".dropdown-content").hide();
        });
    });
    $(document).on("click", function(event)
    {
        var $trigger = $(".dropbtn");
        if($trigger !== event.target && !$trigger.has(event.target).length)
        {
            $(".dropdown-content").hide();
        }            
    });
  </script>
  <!-- <div class="main" style="position: relative; width: 1830px; height: 742px;"> -->
  <div class="main" style="position: relative; width: 100%; height: 100%;">
    <nav class="main-nav">
        <ul class="main-nav-ul">
            <li>    <!-- Creating College menu with submenus Add College -->
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg><label style="position: relative; top: -3px; left: -30px;">College<span class="sub-arrow1"></span></label>
                </a>
                <ul>
                    <li><a href="addcollege.php">Add College</a></li>
                </ul>
            </li>
            <li>    <!-- Creating Departments menu with submenus Add Department and Department Reports -->
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">     <!-- For importing the file text bootstrap icon -->
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg><label style="position: relative; top: -3px; left: -30px;">Departments<span class="sub-arrow3"></span></label>
                </a>
                <ul>
                    <li><a href="adddepartment.php">Add Department</a></li>
                    <li><a href="departmentreports.php">Department Reports</a></li>
                </ul>
            </li>
            <li>    <!-- Creating Courses menu with submenus Add Course and Course Reports -->
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">     <!-- For importing the file text bootstrap icon -->
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg><label style="position: relative; top: -3px; left: -30px;">Courses<span class="sub-arrow5"></span></label>
                </a>
                <ul>
                    <li><a href="addcourse.php">Add Course</a></li>
                    <li><a href="#coursereports">Course Reports</a></li>
                </ul>
            </li>
            <li>    <!-- Creating Students menu with submenu Add Student -->
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">     <!-- For importing the file text bootstrap icon -->
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg><label style="position: relative; top: -3px; left: -30px;">Students<span class="sub-arrow5"></span></label>
                </a>
                <ul>
                    <li><a href="/result/Student/addstudentperson.php">Add Student</a></li>
                </ul>
            </li>
            <li>    <!-- Creating Faculty menu with submenus Add Faculty and Faculty Reports -->
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">     <!-- For importing the file text bootstrap icon -->
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg><label style="position: relative; top: -3px; left: -30px;">Faculty<span class="sub-arrow5"></span></label>
                </a>
                <ul>
                    <li><a href="#addfaculty">Add Faculty</a></li>
                    <li><a href="#facultyreports">Faculty Reports</a></li>
                </ul>
            </li>
            <li>    <!-- Creating Users menu with submenus Add User, User Reports and Log Reports -->
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">     <!-- For importing the file text bootstrap icon -->
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg><label style="position: relative; top: -3px; left: -30px;">Admin<span class="sub-arrow6"></span></label>
                </a>
                <ul>
                    <li><a href="#adduser">Add Admin</a></li>
                    <li><a href="#logreports">Log Reports</a></li>
                </ul>
            </li>
            <li>    <!-- Creating My Account menu with submenus My Profile and Logout -->
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">     <!-- For importing the file text bootstrap icon -->
                        <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                    </svg><label style="position: relative; top: -3px; left: -30px;">My Account<span class="sub-arrow7"></span></label>
                </a>
                <ul>
                    <li><a href="account.php">My Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
            <li class="panel">      <!-- Creating an empty panel with no link in it to cover the extra whitespace left after the last menu and submenu link -->
                <ul>
                    <li></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div style="position: absolute; width: 1576px; height: 738px; top: 0; left: 250px;">
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#C8C8C8" class="bi bi-laptop" style="position: absolute;top: 20px; left: 25px;width: 50px;height: 50px;" viewBox="0 0 16 16">
            <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
        </svg>
    </div>
    <div>
        <label style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color: #BEBEBE; font-size: 28px; position: absolute; top: 30px; left: 90px;">HOME</label>
    </div>
    <div style="width: 10rem;height: 10rem;display: inline-block;background-color: transparent;border-color: #FF0099;border-width: 2px;border-style: solid; position: absolute; top: 100px; left: 15px;">
        <div>
            <a href="addcollege.php" style="height: 9rem;width: 9rem;background-color: #FF0066; border-radius: 50%;display: inline-block; position: absolute; top: 7px; left:7px;"></a>
        </div>
        <div>
            <a href="addcollege.php" class="b" style="height: 9rem; width: 9rem; border-radius: 50%; color: white; font-size: 19px; position: absolute; top: 7px; left: 7px;"><text style="color: white; position:absolute; top: 30%; left: 25%; white-space: pre-line; text-align: center;">Add&#10;College</text></a>
        </div>
    </div>
    <div style="width: 10rem;height: 10rem;display: inline-block;background-color: transparent;border-color: #FF0099;border-width: 2px;border-style: solid; position: absolute; top: 100px; left: 200px;">
        <div>
            <a href="adddepartment.php" style="height: 9rem; width: 9rem;background-color: #FF0066;border-radius: 50%;display: inline-block; position: absolute; top: 7px; left:7px;"></a>
        </div>
        <div>
            <a href="adddepartment.php" class="b" style="height: 9rem; width: 9rem; border-radius: 50%;color: white; font-size: 19px; position: absolute; top: 7px; left: 7px;"><text style="color: white; position: absolute; top: 44px; left: 11%; white-space: pre-line; text-align: center;">Add&#10;Department</text></a>
        </div>
    </div>
    <div style="width: 10rem;height: 10rem;display: inline-block;background-color: transparent;border-color: #FF0099;border-width: 2px;border-style: solid; position: absolute; top: 100px; left: 385px;">
        <div>
            <a href="addcourse.php" style="height: 9rem;width: 9rem;background-color: #FF0066;border-radius: 50%;display: inline-block; position: absolute; top: 7px; left:7px;"></a>
        </div>
        <div>
            <a href="addcourse.php" class="b" style="height: 9rem; width: 9rem; border-radius: 50%; color: white; font-size: 19px; position: absolute; top: 7px; left: 7px;"><text style="color: white; position: absolute; top: 44px; left: 27%; white-space: pre-line; text-align: center;">Add&#10;Course</text></a>
        </div>
    </div>
    <div style="width: 10rem;height: 10rem;display: inline-block;background-color: transparent;border-color: #FF0099;border-width: 2px;border-style: solid; position: absolute; top: 100px; left: 570px;">
        <div>
            <a href="#adduser" style="height: 9rem;width: 9rem;background-color: #FF0066;border-radius: 50%;display: inline-block; position: absolute; top: 7px; left:7px;"></a>
        </div>
        <div>
            <a href="#adduser" class="b" style="height: 9rem; width: 9rem; border-radius: 50%; color: white; font-size: 19px; position: absolute; top: 7px; left: 7px;"><text style="color: white; font-size: 19px; position: absolute; top: 44px; left: 35%; white-space: pre-line; text-align: center;">Add&#10;User</text></a>
        </div>
    </div>
    <div style="width: 10rem;height: 10rem;display: inline-block;background-color: transparent;border-color: #FF0099;border-width: 2px;border-style: solid; position: absolute; top: 100px; left: 755px;">
        <div>
            <a href="#usersreports" style="height: 9rem;width: 9rem;background-color: #FF0066;border-radius: 50%;display: inline-block; position: absolute; top: 7px; left:7px;"></a>
        </div>
        <div>
            <a href="#usersreports" class="b" style="height: 9rem; width: 9rem; border-radius: 50%; color: white; font-size: 19px; position: absolute; top: 7px; left: 7px;"><text style="color: white; font-size: 19px; position: absolute; top: 44px; left: 25%; white-space: pre-line; text-align: center;">Log&#10;Reports</text></a>
        </div>  
    </div>
    <div style="width: 10rem;height: 10rem;display: inline-block;background-color: transparent;border-color: #FF0099;border-width: 2px;border-style: solid; position: absolute; top: 100px; left: 940px;">
        <div>
            <a href="account.php" style="height: 9rem;width: 9rem;background-color: #FF0066;border-radius: 50%;display: inline-block; position: absolute; top: 7px; left:7px;"></a>
        </div>
        <div>
            <a href="account.php" class="b" style="height: 9rem; width: 9rem; border-radius: 50%; color: white; font-size: 19px; position: absolute; top: 7px; left: 7px;"><text style="color: white; font-size: 19px; position: absolute; top: 44px; left: 25%; white-space: pre-line; text-align: center;">My&#10;Account</text></a>
        </div>
    </div>
    <div style="width: 10rem;height: 10rem;display: inline-block;background-color: transparent;border-color: #FF0099;border-width: 2px;border-style: solid; position: absolute; top: 100px; left: 1125px;">
        <div>
            <a href="logout.php" style="height: 9rem;width: 9rem;background-color: #FF0066;border-radius: 50%;display: inline-block; position: absolute; top: 7px; left:7px;"></a>
        </div>
        <div>
            <a href="logout.php" class="b" style="height: 9rem; width: 9rem; border-radius: 50%; color: white; font-size: 19px; position: absolute; top: 7px; left: 7px;"><text style="color: white; font-size: 19px; position: absolute; top: 56px; left: 27%; white-space: pre-line; text-align: center;">Logout</text></a>
        </div>
    </div>
    </div>
  </div>
</body>
</html>