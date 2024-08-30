<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
<?php
session_start();
<<<<<<< HEAD
require_once('../../Database/connection.php');
if(isset($_POST['update'])) {
    header("refresh:5");
=======
$connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}	
//print_r($_SESSION);
//$uname = $_SESSION['username'];
//$uid = $_SESSION['uid'];
if(isset($_POST['update'])) {
    header("refresh:3");
>>>>>>> be24171 (README.md file committed!)
}
if(!isset($_SESSION['uid']))
{
  echo"<script>alert('Unauthorised access!!!');</script>";
  die();
}

$sql = "SELECT * FROM user,student WHERE user.user_id = student.user_id AND student.user_id=".(int)$_SESSION['uid'];
$result = mysqli_query($connection,$sql);
echo(( mysqli_error($connection)));
$row = mysqli_fetch_assoc($result);
$name = explode(" ",$row['u_name']);
$photo = $row['photo_path'];
$gender = $row['gender'];
$dob = $row['dob'];
$address = $row['address'];
$email = $row['email'];
$phone_no = $row['phone_no'];
$PRN = $row['PRN'];
$rno = $row['roll_no'];
<<<<<<< HEAD
$sql = "SELECT college_name,dept_name FROM college,department WHERE college.college_id = department.college_id AND department.college_id=".(int)$row['college_id']." AND dept_id =".(int) $row['dept_id'];

$result = mysqli_query($connection,$sql);
=======

$result = mysqli_query($connection,"SELECT college_name,dept_name FROM college,department WHERE college.college_id = department.college_id AND department. college_id=".(int)$row['college_id']);
>>>>>>> be24171 (README.md file committed!)
echo(( mysqli_error($connection)));
$college = mysqli_fetch_assoc($result);

$result = mysqli_query($connection,"SELECT c_name FROM course WHERE course_id=".(int)$row['course_id']);
echo(( mysqli_error($connection)));
$course = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>User </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

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

        Filevalidation = () => {
            const fi = document.getElementById('file');
            // Check if any file is selected.
            if (fi.files.length > 0) {
                for (const i = 0; i <= fi.files.length - 1; i++) {
    
                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    if (file >= 5120) {
                        alert(
                        "File too Big, please select a file less than 5MB");
                            document.getElementById('file').value = null;
                    } else {
                        document.getElementById('size').innerHTML = '<b>'
                        + file + '</b> KB';
                    }
                }
            }
        }
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#http://www.creative-tim.com" class="simple-text">
                    Hello <?php echo$_SESSION['name']?> !
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./user.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./subject.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Subject List</p>
                        </a>
                    </li>
                    <li>
<<<<<<< HEAD
                        <a class="nav-link" href="result.php">
=======
                        <a class="nav-link" href="./result.php">
>>>>>>> be24171 (README.md file committed!)
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Result</p>
                        </a>
                    </li>
<<<<<<< HEAD
=======
                   <!-- <li>
                        <a class="nav-link" href="./icons.html">
                            <i class="nc-icon nc-atom"></i>
                            <p>Assignments</p>
                        </a>
                    </li>-->
                    <!--<li>
                        <a class="nav-link" href="./maps.html">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Maps</p>
                        </a>
                    </li>-->
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <!--<li class="nav-item active active-pro">
                        <a class="nav-link active" href="upgrade.html">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>-->
>>>>>>> be24171 (README.md file committed!)
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> My Profile </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
<<<<<<< HEAD
=======
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
>>>>>>> be24171 (README.md file committed!)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./user.php">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
<<<<<<< HEAD
=======
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
>>>>>>> be24171 (README.md file committed!)
                            <li class="nav-item">
                                <a class="nav-link" href="./logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" novalidate id="needs-validation" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">
                                                    <label>College</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="College" value="<?php echo$college['college_name']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Username" value="<?php echo$_SESSION['username']?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Course Enrolled In</label>
                                                    <input type="email" readonly class="form-control"  placeholder="Course Name" value="<?php echo$course['c_name']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>PRN</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="PRN" value="<?php echo$PRN?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Roll Number</label>
                                                    <input type="text" class="form-control" disabled="" placeholder="Roll Number" value="<?php echo$rno?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name='fname' pattern="^[a-zA-Z ]{2,30}$" required class="form-control" placeholder="First Name" value="<?php echo$name[0]?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name='lname' pattern="^[a-zA-Z ]{2,30}$" required class="form-control" placeholder="Last Name" value="<?php echo$name[1]?>">

                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <input type="tel" name='mobile' pattern="^\d{10}$" required class="form-control" placeholder="Contact Number" value="<?php echo$phone_no ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input type="email" name='email' class="form-control" required placeholder="Email" value="<?php echo$email?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" name='dob' min="1980-12-31" max="2001-01-01" class="form-control" placeholder="Contact Number" value="<?php echo$dob ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <div class="">
                                                    <select class="custom-select" name="gender" required>
                                                        <option  value="">Select Gender</option>
                                                        <?php
                                                        if(strcmp(strtolower($gender),"male")==0)
                                                        {?>
                                                            <option value="male" selected>Male</option>
                                                            <option value="female" >Female</option>
                                                            <?php } 
                                                        else
                                                        {?>
                                                            <option value="male" >Male</option>
                                                            <option value="female" selected>Female</option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" name="address" rows="5" cols="180" placeholder="Address"><?php echo $address?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Upload a new photo</label>
                                                    <input type="file" class="form-control-file" name='filepath' id="file" onchange="Filevalidation()" name ="filepath">
                                                </div>
                                            </div>
<<<<<<< HEAD
                                            
                                        </div>
                                    <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Profile</button>
=======
                                            <!-- <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" placeholder="Country" value="Student1">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                   <label>Postal Code</label>
                                                    <input type="number" class="form-control" placeholder="ZIP Code">
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike"><?php print_r($row);?></textarea>
                                                </div>
                                            </div>  
                                        </div> -->
                                        <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Profile</button>
>>>>>>> be24171 (README.md file committed!)
<?php
// define variables and set to empty values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  $full_name = $fname." ".$lname;
  $email = test_input($_POST["email"]);
  $mobile_no = test_input($_POST["mobile"]);
  $dob = test_input($_POST["dob"]);
  $gender = test_input($_POST["gender"]);
  $address = test_input($_POST["address"]);
<<<<<<< HEAD
  $sql = "UPDATE user SET u_name='".$full_name."', gender='".$gender."', dob='".$dob."', address='".$address."', email='".$email."', phone_no=".$mobile_no." WHERE user_id=".$_SESSION['uid'];
  if (mysqli_query($connection, $sql)) {?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong> Record updated successfully.<br> The page will refresh in 5 Seconds!
=======
  $sql = "UPDATE user SET u_name='".$full_name."', gender='".$gender."', dob='".$dob."', address='".$address."', email='".$email."', phone_no=".$phone_no." WHERE user_id=".$_SESSION['uid'];
  if (mysqli_query($connection, $sql)) {?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong> Record updated successfully.
>>>>>>> be24171 (README.md file committed!)
      <?php
      $_SESSION['name'] = $full_name;
       header("refresh:0");?>
    </div>
  <?php } else {?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> Data could not be updated!<?php echo mysqli_error($connection);?>
      </div>
  <?php }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
<<<<<<< HEAD
$target_dir = "/var/www/domain1.com/public_html/STMS-complete/STMS/res/";
$relative_path = "/STMS-complete/STMS/res/user";
=======
$target_dir = "/var/www/happy.com/html/STMS/res/";
$relative_path = "/STMS/res/";
>>>>>>> be24171 (README.md file committed!)
$target_file = $target_dir . basename($_FILES["filepath"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["update"]) && $_FILES['filepath']["error"]==0) {
  $check = getimagesize($_FILES["filepath"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
      echo "File is not an image".$check['mime'];
      $uploadOk = 0;
    }
    // Check if file already exists
  if (file_exists($target_file)) {
    echo "<br>Sorry, file already exists.";
    unlink(realpath($photo));
    $uploadOk = 1;
  }
  // Check file size
  else if ($_FILES["filepath"]["size"] > 5000000) {
    echo "<br>Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {?>
     <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sorry!</strong> <?php echo "The file ". htmlspecialchars( basename( $_FILES["filepath"]["name"])). " was not uploaded."; ?>
    </div>
    echo ";
  // if everything is ok, try to upload file
  <?php } else {
<<<<<<< HEAD
    unlink("/var/www/domain1.com/public_html".$_SESSION['photo']);
    if (move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_dir."user".$_SESSION['uid'].'.'.$imageFileType)) {
        
        $relative_path = $relative_path.$_SESSION['uid'].'.'.$imageFileType;
=======
    unlink(realpath($photo));
    if (move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_dir."user".$_SESSION['uid'].'.'.$imageFileType)) {
        
        $relative_path = $relative_path."user".$_SESSION['uid'].'.'.$imageFileType;
>>>>>>> be24171 (README.md file committed!)
      ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> <?php echo "The file ". htmlspecialchars( basename( $_FILES["filepath"]["name"])). " has been uploaded.";
        mysqli_query($connection,"UPDATE user SET photo_path='".$relative_path."' WHERE user.user_id=".$_SESSION['uid']);
        $_SESSION['photo'] = $relative_path; ?>
      </div>
      <?php
    } else {?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> <?php echo "The file ". htmlspecialchars( basename( $_FILES["filepath"]["name"])). " could NOT be uploaded."; ?>
    </div>
    <?php }
  }
  unset($_FILES);
  unset($_POST['update']);
}
<<<<<<< HEAD
mysqli_close($connection);
=======
//mysqli_close($connection);
>>>>>>> be24171 (README.md file committed!)
?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?php echo$email?>">
                                            <!-- <img class="avatar border-gray" src="../assets/img/faces/6455250.jpg" alt="..."> -->
                                            <img class="avatar border-gray" src="<?php echo$photo?>" alt="<?php echo$photo ?>">
                                            <h5 class="title"><?php echo$name[0]." ".$name[1]?></h5>
                                        </a>
                                        <p class="description">
                                        
                                            <b><?php echo $course[0] ?></b><!-- Course Name-->
                                        </p>
                                    </div>
                                    <p class="description text-center">
                                        Hey, it's <?php echo$name[0]." ".$name[1]?>
                                        <br> studying in <?php echo$college['college_name']?>,
                                        <br> <?php echo$college['dept_name']?> Department
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
<<<<<<< HEAD
                            <a href="http://www.fergusson.edu">Fergussonian</a>, made with love for a better web
=======
                            <a href="#http://www.creative-tim.com">Fergussonian</a>, made with love for a better web
>>>>>>> be24171 (README.md file committed!)
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
<<<<<<< HEAD
=======
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
-->

<?php
// define variables and set to empty values
/* $name = $email = $gender = $dob = $mobile_no = $address = $username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  $name = $fname." ".$lname;
  $email = test_input($_POST["email"]);
  $mobile_no = test_input($_POST["mobile"]);
  $dob = test_input($_POST["dob"]);
  $gender = test_input($_POST["gender"]);
  $address = test_input($_POST["address"]);
  $sql = "UPDATE user SET u_name='".$name."', gender='".$gender."', dob='".$dob."', address='".$address."', email='".$email."', phone_no=".$phone_no." WHERE user_id=".$_SESSION['uid'];
  if (mysqli_query($connection, $sql)) {?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong> Record updated successfully.
      <?php
      $_SESSION['name'] = $name;
       header("refresh:0");?>
    </div>
  <?php } else {?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> Data could not be updated!<?php echo mysqli_error($connection);?>
      </div>
  <?php }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$target_dir = "/var/www/happy.com/html/STMS/res/";
$relative_path = "/STMS/res/";
$target_file = $target_dir . basename($_FILES["filepath"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["update"]) && $_FILES['filepath']["error"]==0) {
  $check = getimagesize($_FILES["filepath"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
      echo "File is not an image".$check['mime'];
      $uploadOk = 0;
    }
    // Check if file already exists
  if (file_exists($target_file)) {
    echo "<br>Sorry, file already exists.";
    $uploadOk = 0;
  }
  // Check file size
  else if ($_FILES["filepath"]["size"] > 5000000) {
    echo "<br>Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {

    if (move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_dir."user".$_SESSION['uid'].'.'.$imageFileType)) {
        
        $relative_path = $relative_path."user".$_SESSION['uid'].'.'.$imageFileType;
      ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> <?php echo "The file ". htmlspecialchars( basename( $_FILES["filepath"]["name"])). " has been uploaded.";
        echo$relative_path;
        mysqli_query($connection,"UPDATE user SET photo_path='".$relative_path."' WHERE user.user_id=".$_SESSION['uid']);
        $_SESSION['photo'] = $relative_path; ?>
      </div>
      <?php
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  unset($_FILES);
  unset($_POST['update']);
}
mysqli_close($connection); */
?>

>>>>>>> be24171 (README.md file committed!)
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
