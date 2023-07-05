<?php
session_start();
require_once('../../Database/connection.php');

//print_r($_SESSION);
//$uname = $_SESSION['username'];
//$uid = $_SESSION['uid'];
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

$uname=$_POST['name'];
$ugender=$_POST['gender'];
$udob=$_POST['dob'];
$uaddress=$_POST['address'];
$uphoneno=$_POST['mobile_no'];
$uemail=$_POST['email'];

$sql_new="select * from user where u_name='".$_POST['name']."'";
$result_new = mysqli_query($connection,$sql_new);
$row_new = mysqli_fetch_assoc($result_new);
$uid=$row_new['user_id'];
$sphoto=$row_new['photo_path'];
$clgid=$_SESSION['col'];
$deptid=$_SESSION['dept'];
$courseid=$_SESSION['course'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
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
          width: 13em;
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
                      "File too Big, please select a file less than 5mb");
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
            <div class="dropdown-menu dropdown-menu" style="margin-left:8.2%;margin-top:-1%;">
                <span class="decorate"><a class="dropdown-item" href="../College/addcollege.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add College</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Departments&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:13.94%;margin-top:-1%;">
                <span class="decorate"><a class="dropdown-item" href="../Department/adddepartment.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Department</a></span>
                <span class="decorate"><a class="dropdown-item" href="../Department/departmentreports.php"><i class="fa fa-file"></i>&nbsp;&nbsp;Department Reports</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Courses&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:21.74%;margin-top:-1%;">
                <span class="decorate"><a class="dropdown-item" href="../Course/addcourse.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Course</a></span>
                <span class="decorate"><a class="dropdown-item" href="../Course/coursereports.php"><i class="fa fa-file"></i>&nbsp;&nbsp;Course Reports</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Students&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:27.74%;margin-top:-1%;">
                <span class="decorate"><a class="dropdown-item" href="../Student/addstudent.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Student</a></span>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                &nbsp;&nbsp;Faculty&nbsp;&nbsp;
              </a>
            <div class="dropdown-menu dropdown-menu" style="margin-left:34%;margin-top:-1%;">
                <span class="decorate"><a class="dropdown-item" href="../Faculty/addfaculty.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add Faculty</a></span>
              </div>
          </li>
        </ul>
        <ul class="navbar-nav dropdown ml-auto">
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
              <img src="<?php echo$photo;?>" width="30px" height="30px" style="border-radius:50%;"/>&nbsp;&nbsp;
              Welcome&nbsp;<?php $_SESSION['name']=$name;echo$_SESSION['name'];?>&nbsp;!
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <span class="decorate"><a class="dropdown-item" href="../Profile/myaccount.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a></span>
                <span class="decorate"><a class="dropdown-item" href="../Profile/logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log out</a></span>
              </div>
            </li>
        </ul>
    </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="center" novalidate id="needs-validation" enctype="multipart/form-data">
    <h3>Add Admin</h3>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Admin Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" auto-complete="off" placeholder="Enter the Faculty Name" id="name" name="name" pattern="^[a-zA-Z ]{2,30}$" value="" required>
          <div class="invalid-tooltip">Please enter the Admin Name!</div>
        </div>
    </div>
    <div class="form-group row">
        <label for="profile_pic" class="col-sm-2 col-form-label">Admin Profile<br>Photo</label>
        <div class="col-sm-5">
          <img src="<?php echo$sphoto;?>" width="100px" height="100px" style="border-radius:50%; border: 1px solid white;"/>
          <input type="file" class="form-control-file" id="file" onchange="Filevalidation()" name ="filepath" required>
          <div class="invalid-tooltip">Please upload the Admin Image!</div>
        </div>       
    </div>
    <div class="form-group row ">
        <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-5">
            <select class="custom-select" name="gender" required>
              <option  value="">Select Gender</option>
                <option value="male" >Male</option>
                <option value="female" >Female</option>
            </select>
            <div class="invalid-tooltip">Please choose gender!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
        <div class="col-sm-5">
          <input type="date" class="form-control" id="dob" name="dob"  value="" min="1949-12-31" max="2003-01-01" required> 
          <div class="invalid-tooltip">Please enter the valid date of birth!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-5">
        <textarea class="form-control" id="address" rows="4" name="address" placeholder="Enter the address" maxlength="250" required></textarea>
          <div class="invalid-tooltip">Please enter the address!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="mobile_no" class="col-sm-2 col-form-label">Mobile No.</label>
        <div class="col-sm-5">
          <input type="tel" pattern="^\d{10}$" class="form-control" id="phonenumber" placeholder="Enter the Mobile Number" name="mobile_no" value="" required>
          <div class="invalid-tooltip">Please enter the valid Phone number!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="email" name="email" value="" placeholder="Enter the Email ID" required>
            <div class="invalid-tooltip">Please enter the valid Email!</div>
        </div>
      </div>
      <div class="form-group row">
      <label for="add" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-3">
          <button type="submit" name="add" class="btn btn-primary">Add Admin Details</button>
        </div>
      </div>
      <?php
        // Check if image file is a actual image or fake image
        if(isset($_POST['add']) && $_FILES['filepath']["error"]==0)
        {
            $new_sql="SELECT COUNT(u_name) from user where u_name='".$uname."' and email='".$uemail."'";
            $new_result=mysqli_query($connection, $new_sql);
            $new_row=mysqli_fetch_row($new_result);
            if($new_row[0]==0)
            {
                $date_field = date('Y-m-d',strtotime($udob));
                $new_sql="INSERT INTO user(u_name,gender,dob,address,phone_no,email) VALUES('".$uname."','".$ugender."','".$date_field."','".$uaddress."','".$uphoneno."','".$uemail."')"; 
                if(mysqli_query($connection, $new_sql))
                {?>
                    <?php $UID = mysqli_insert_id($connection);?>
                    <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Admin Details added successfully!
                    <?php header("refresh:0");?>  
                    </div>
                  <?php
                    $target_dir = "/var/www/domain1.com/public_html/STMS-complete/STMS/res/";
                    $target_file = $target_dir . basename($_FILES["filepath"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $check = getimagesize($_FILES["filepath"]["tmp_name"]);
                    if($check !== false) 
                    {
                        // echo "File is an image - " . $check["mime"] . ".";
                    } 
                    else 
                    {
                        echo "File is not an image".$check['mime'];
                        $uploadOk = 0;
                    }
                    // Check if file already exists
                    if (file_exists($target_file)) 
                    {
                        echo "<br>Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                    // Check file size
                    if ($_FILES["filepath"]["size"] > 5000000) 
                    {
                        echo "<br>Sorry, your file is too large.";
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"  && $imageFileType != "gif" ) 
                    {
                        echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) 
                    {
                        echo "<br>Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    }
                    else 
                    {
                        if(move_uploaded_file($_FILES["filepath"]["tmp_name"],$target_dir."user".$UID.'.'.$imageFileType))
                        {
                        ?>
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Success!</strong> <?php echo "The file ". htmlspecialchars( basename( $_FILES["filepath"]["name"])). " has been uploaded.";
                          $path="/STMS-complete/STMS/res/";
                          mysqli_query($connection, "UPDATE user SET photo_path='".$path.""."user".$UID.'.'.$imageFileType."' WHERE user_id=$UID");?>
                        </div>
                        <?php header("refresh:0");
                        }
                        else 
                        {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                }
                else
                {?>
                    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong>
                    Admin Details could not be inserted!<?php echo mysqli_error($connection);?>
                    </div> 
                    <?php
                }
            }
            else
            {?>
                <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> Admin with the given name already exists!
                </div>
                <?php
            }
            $new_sql="SELECT COUNT(username) from log_in where username='".$uemail."' and role_id=1";
            $new_result=mysqli_query($connection, $new_sql);
            $new_row=mysqli_fetch_row($new_result);
            if($new_row[0]==0)
            {
                $new_sql="INSERT INTO log_in(username,pass,role_id,user_id) VALUES('".$uemail."',MD5('.$uname.@123"."'),1,$UID)";
                if(mysqli_query($connection, $new_sql))
                {?>
                    <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Admin Login Details given successfully!
                    </div>
                  <?php
                }
                else
                {?>
                    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong>
                    Admin Login Details could not be given successfully!<?php echo mysqli_error($connection);?>
                    </div> 
                  <?php
                }
            }
            else
            {?>
                <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> Admin Login already exists!
                </div>
                <?php
            }
        }
      ?>
    </form>
  </body>
</html>
