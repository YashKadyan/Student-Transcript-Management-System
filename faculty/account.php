<?php
if(isset($_POST['update']) and $_FILES['filepath']["error"]==0)
{
  unset($_POST['update']);
  header("refresh:5");
}
session_start();
require_once('../Database/connection.php');

if(!isset($_SESSION['uid']))
{
  echo"<script>alert('Unauthorised access!!!');</script>";
  die();
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
    <title>My Account</title>
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
          background-color: #f6ead4;
          border-radius: 10px;
          z-index: 1;
        }
        button.btn-primary {
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          color: whitesmoke;
          border: none;
          width:7em;
          transition: all 1s;
          transition-timing-function: ease-in-out;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size:16px;
          margin:4px 2px;
          cursor:pointer;
          transition-duration: 0.4s;  
        }
        button.btn-primary:hover {
          width: 20.7em;
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
        /* var d = new Date();
        var d1 = new Date(d.getFullYear()-18,d.getMonth(),d.getDate());
        var date_str = d1.getFullYear()+"-"+d1.getMonth() +"-"+d1.getDate(); */
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
              <span class="decorate"><a class="dropdown-item" href="searchresult.php?">Search Result</a></span>
              <span class="decorate"><a class="dropdown-item" href="studentreport.php">Student Reports</a></span>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav dropdown ml-auto">
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
              <img src="<?php echo$photo;?>" width="30px" height="30px" style="border-radius:50%;"/>&nbsp;&nbsp;
              Welcome&nbsp;<?php echo$_SESSION['name'];?>&nbsp;!
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <span class="decorate"><a class="dropdown-item" href="account.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a></span>
                <span class="decorate"><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log out</a></span>
              </div>
            </li>
        </ul>
    </nav>

   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="center" novalidate id="needs-validation" enctype="multipart/form-data">
      <h3>My Account</h3>
      <div class="form-group row">
        <label for="profile_pic" class="col-sm-2 col-form-label">Profile <br>Photo</label>
        <div class="col-sm-5">
          <img src="<?php echo$photo;?>" width="100px" height="100px" style="border-radius:10%;"/><br><br>
          <input type="file" class="form-control-file" id="file" onchange="Filevalidation()" name ="filepath" >
        </div>
         
      </div>

      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="name" name="name" pattern="^[a-zA-Z ]{2,30}$" value="<?php echo$name;?>" required>
        <div class="invalid-tooltip">Please enter the name.</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="mobile_no" class="col-sm-2 col-form-label">Mobile</label>
        <div class="col-sm-5">
          <input type="tel" pattern="^\d{10}$" class="form-control" required="" id="phonenumber" name="mobile_no" value="<?php echo $phone_no;?>"/>
          <div class="invalid-tooltip">Please enter the valid Phone number.</div>
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" id="email" name="email" value="<?php echo$email;?>" required>
            <div class="invalid-tooltip">Please enter the valid Email.</div>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
        <div class="col-sm-5">
          <input type="date" class="form-control" id="dob" name="dob"  value="<?php echo$dob;?>" min="1949-12-31" max="2003-01-01" required> 
          <div class="invalid-tooltip">Please enter the vaid date of birth.</div>
        </div>
      </div>
      <div class="form-group row ">
        <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-5">
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
            <div class="invalid-tooltip">Please choose gender</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-5">
        <textarea class="form-control" id="address" rows="4" name="address" placeholder="Enter your address here!" maxlength="250" required><?php echo $address;?></textarea>
          <div class="invalid-tooltip">Please enter the address.</div>
        </div>
      </div>
      
      <div class="form-group row">
        <label for="uname" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" disabled name="username" id="username" placeholder="Login ID" value="<?php echo $_SESSION['username'];?>" required/>
            <div class="invalid-tooltip">Please enter the valid login id.</div>
        </div>
      </div>
      <div class="form-group row">
      <label for="update" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-3">
          <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
      </div>
    
  
<!--
  https://colorlib.com/etc/cf/ContactFrom_v3/index.html
-->

<?php
// define variables and set to empty values
$name = $email = $gender = $dob = $mobile_no = $address = $username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $mobile_no = test_input($_POST["mobile_no"]);
  $dob = test_input($_POST["dob"]);
  $gender = test_input($_POST["gender"]);
  $username = test_input($_POST["username"]);
  $address = test_input($_POST["address"]);
  $sql = "UPDATE user SET u_name='".$name."', gender='".$gender."', dob='".$dob."', address='".$address."', email='".$email."', phone_no=".$mobile_no." WHERE user_id=".$_SESSION['uid'];
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
$target_dir = "/var/www/domain1.com/public_html/STMS-complete/STMS/res/";
$target_file = $target_dir . basename($_FILES["filepath"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

if(isset($_REQUEST["update"]) && $_FILES['filepath']["error"]==0) {
  $check = getimagesize($_FILES["filepath"]["tmp_name"]);
  if($check !== false) {
 //   echo "File is an image - " . $check["mime"] . ".";
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
    if(!unlink("/var/www/domain1.com/public_html".$_SESSION['photo'])) {
      //echo"Previous Profile photo COUND NOT BE DELETED!!!";
    }
    if (move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_dir."user".$_SESSION['uid'].'.'.$imageFileType)) {
      ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> <?php echo "The file ". htmlspecialchars( basename( $_FILES["filepath"]["name"])). " has been uploaded.";
        $photo_path = "/STMS-complete/STMS/res/user".$_SESSION['uid'].".".$imageFileType;
        mysqli_query($connection,"UPDATE user SET photo_path='/STMS/res/user".$_SESSION['uid'].".".$imageFileType."' WHERE user.user_id=".$_SESSION['uid']);
        $_SESSION['photo'] = $photo_path; ?>
      </div>
      <?php
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  unset($_FILES);
  unset($_POST['update']);
}
mysqli_close($connection);
?>
    </form>
  </body>
</html>
