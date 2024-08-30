<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  <!-- For importing the 3 bar icon in the main navbar -->
    <style>
        /* Top Main Navbar and Sidebar Dropdown Menu */
        body
        {
            margin: -1px;
            font-family: Arial, Helvetica, sans-serif;
        }
        /* Top Main Navbar */
        .topnav
        {
            background-color: #003300;
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
            background-color: #333366;
        }
        .main-nav a     /* Apply styling to the links in Sidebar navigation with Bottom Border */
        {
            color: #FFF;
            display: block;
            padding: 16px 3px 16px 53px;
            letter-spacing: .1em;
            border-bottom: 1px solid white;
            width: 220px;
            margin: 0 -1em;
            font-size: 17px;
            transition: all 0.5s ease-in-out;       /* For Animation */
        }
        .main-nav a:hover   /* Change the background color of the links in Dropdown menu to dark blue after hover */
        {
            background: #000033;
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
            color: yellow;
            font-size: 35px;
            line-height: 48px;
            padding: 4px 30px;
            font-weight: lighter;
        }
        label.logo2     /* Give styling to the second label and adjust its position */
        {
            color: blue;
            font-size: 35px;
            line-height: 48px;
            padding: 4px 0;
            margin-left:-20px;
            font-weight: lighter;
        }
        .flex-container>div     /* This defines a flex container. It may be inline or block depending on the given value. It enables a flex context for all its direct children */
		{
			padding: 5px;
            display: flex;      /* Displays an element as a block-level (one below the other) flex container */
		}
        .panel      /* Create a blank panel to cover the extra blank space left after the last menu and submenu link and give it the same color as that of the unselected menu links */
        {
            background-color: #333366;
            height: 267px;
            width: 220px;
            margin: 1px;
        }
    </style>
</head>
<body>
  <div class="flex-container">
    <div class="topnav">
        <i class="material-icons" style="margin-left: 10px; margin-top: 10px; font-size: 2.40em; color:white;">menu</i> <!-- menu is given as it is used for displaying the 3 bars icon on main navbar -->
        <label class="logo1">RESULT MANAGEMENT</label>
        <label class="logo2">ADMIN</label>
        <label class="logo3"><?php echo$_SESSION['username']; ?></label>
    </div>
  </div>
  <nav class="main-nav">
    <ul class="main-nav-ul">
        <li>    <!-- Creating Subject menu with submenus Add Subjects and Subject Reports -->
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg><label style="position: relative; top: -3px; left: -30px;">Subjects<span class="sub-arrow1"></span></label>
            </a>
            <ul>
                <li><a href="#addsubjects">Add Subjects</a></li>
                <li><a href="#subjectreports">Subject Reports</a></li>
            </ul>
        </li>
        <li>    <!-- Creating Class menu with submenus Add Class and Class Reports -->
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg><label style="position: relative; top: -3px; left: -30px;">Class<span class="sub-arrow2"></span></label>
            </a>
            <ul>
                <li><a href="#addclass">Add Class</a></li>
                <li><a href="#classreports">Class Reports</a></li>
            </ul>
        </li>
        <li>    <!-- Creating Departments menu with submenus Add Department and Department Reports -->
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg><label style="position: relative; top: -3px; left: -30px;">Departments<span class="sub-arrow3"></span></label>
            </a>
            <ul>
                <li><a href="#adddepartment">Add Department</a></li>
                <li><a href="#departmentreports">Department Reports</a></li>
            </ul>
        </li>
        <li>    <!-- Creating School Year with submenus Add Year and Year Reports -->
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg><label style="position: relative; top: -3px; left: -30px;">School Year<span class="sub-arrow4"></span>
            </a>
            <ul>
                <li><a href="#addyear">Add Year</a></li>
                <li><a href="#yearreports">Year Reports</a></li>
            </ul>
        </li>
        <li>    <!-- Creating Students menu with submenus Add Student and Student Reports -->
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg><label style="position: relative; top: -3px; left: -30px;">Students<span class="sub-arrow5"></span></label>
            </a>
            <ul>
                <li><a href="#addstudent">Add Student</a></li>
                <li><a href="#studentreports">Student Reports</a></li>
            </ul>
        </li>
        <li>    <!-- Creating Users menu with submenus Add User, User Reports and Log Reports -->
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg><label style="position: relative; top: -3px; left: -30px;">Users<span class="sub-arrow6"></span></label>
            </a>
            <ul>
                <li><a href="#addstudent">Add User</a></li>
                <li><a href="#usersreports">Users Reports</a></li>
                <li><a href="#logreports">Log Reports</a></li>
            </ul>
        </li>
        <li>    <!-- Creating My Account menu with submenu Logout -->
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" fill="white" class="bi bi-file-text" style="transform: rotate(-180deg); position: relative; left: -35px; top: 4px;" viewBox="0 0 16 16">
                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg><label style="position: relative; top: -3px; left: -30px;">My Account<span class="sub-arrow7"></span></label>
            </a>
            <ul>
                <li><a href="#logout">Logout</a></li>
            </ul>
        </li>
        <li class="panel">      <!-- Creating an empty panel with no link in it to cover the extra whitespace left after the last menu and submenu link -->
            <ul>
                <li></li>
            </ul>
        </li>
    </ul>
  </nav>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             