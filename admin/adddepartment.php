<?php
session_start();
$connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}
if(!isset($_SESSION['uid']))
{
  header("location:/result/Home/home.html");
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

$deptname=$_POST['deptname'];
$classrooms=$_POST['no_class_rooms'];
$benches=$_POST['no_benches'];
$computers=$_POST['no_computers'];
$clgname=$_POST['clg'];
$sql_new="select college_id from college where college_name='".$clgname."'";
$result_new=mysqli_query($connection,$sql_new);
$row_new=mysqli_fetch_assoc($result_new);
$Clgid=$row_new['college_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
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
          width: 24.5em;
          border: none;
        }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
  </script>
  </head>     
  <body>
    <nav class="navbar py-3 navbar-expand-sm bg-dark navbar-dark fixed-top">
        <!-- Brand -->
        <a class="navbar-brand" href="#">STMS</a>
      
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="adminhome.php">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav dropdown ml-auto">
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
                <img src="<?php echo$photo;?>" width="35px" height="35px" style="border-radius:50%;"/>&nbsp;&nbsp;Welcome&nbsp;<?php $_SESSION['name']=$name; echo$_SESSION['name'];?>&nbsp;!
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <span class="decorate"><a class="dropdown-item" href="myaccount.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a></span>
                <span class="decorate"><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log out</a></span>
              </div>
            </li>
        </ul>
    </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="center" novalidate id="needs-validation" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="clgname" class="col-sm-2 col-form-label">College Name</label>
        <div class="col-sm-5">
            <select name="clg" id="clg" class="custom-select" style="position: relative; top: 2%; height: 100%;" required>
              <option value="">Select College</option>
              <?php
                  $new_sql=mysqli_query($connection, "SELECT college_name from college");
                  $new_row=mysqli_num_rows($new_sql);
                  while($new_row=mysqli_fetch_array($new_sql))
                  {
                      echo "<option value='".$new_row['college_name']."'>".$new_row['college_name']."</option>";
                  }
              ?>
            </select>
            <div class="invalid-tooltip">Please Select the College Name!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="deptname" class="col-sm-2 col-form-label">Department Name</label>
        <div class="col-sm-5">
          <input type="text " class="form-control" id="deptname" name="deptname" placeholder="Enter Department Name" autocomplete="off" pattern="^[a-zA-Z ]{1,}$" value="" required>
            <div class="invalid-tooltip">Please Enter the Department Name!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="no_of_classrooms" class="col-sm-2 col-form-label">No. of Classrooms</label>
        <div class="col-sm-5">
          <input type="number" class="form-control" id="no_class_rooms" name="no_class_rooms" autocomplete="off"
          placeholder="Enter Number of Classrooms" pattern="^\d{1,}$" value="" required>
            <div class="invalid-tooltip">Please Enter the Number of Classrooms!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="no_of_benches" class="col-sm-2 col-form-label">No. of Benches</label>
        <div class="col-sm-5">
          <input type="number" class="form-control" id="no_benches" name="no_benches" autocomplete="off"
          placeholder="Enter Number of Benches" pattern="^\d{1,}$" value="" required>
            <div class="invalid-tooltip">Please Enter the Number of Benches!</div>
        </div>
      </div>
      <div class="form-group row">
        <label for="no_of_computers" class="col-sm-2 col-form-label">No. of Computers</label>
        <div class="col-sm-5">
          <input type="number" class="form-control" id="no_computers" name="no_computers" autocomplete="off"
          placeholder="Enter Number of Computers" pattern="^\d{1,}$" value="" required>
            <div class="invalid-tooltip">Please Enter the Number of Computers!</div>
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
          $new_sql="SELECT COUNT(dept_name) from department where dept_name='".$deptname."' and college_id='".$Clgid."'";
          $new_result=mysqli_query($connection, $new_sql);
          $new_row=mysqli_fetch_row($new_result);
          if($new_row[0]==0)
          {
            $new_sql="INSERT INTO department(dept_name,college_id,no_of_classrooms,no_of_benches,no_of_computers) VALUES('".$deptname."',$Clgid,'".$classrooms."','".$benches."','".$computers."')";
            if(mysqli_query($connection, $new_sql))
            {?>
                <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Department added successfully!
                <?php header("refresh:0");?>
              </div>
            <?php
            }
            else
            {?>
                <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong>
                Department could not be inserted!<?php echo mysqli_error($connection);?>
              </div> 
            <?php
            }
          }
          else
          {?>
              <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Error!</strong> Department already exists!
            </div>
          <?php
          }
        }
        ?>
    </form>
  </body>
</html>