<?php
session_start();
$connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}

if(!isset($_SESSION['uid']))
{
  echo"<script>alert('Unauthorised access!!!');</script>";
  die();
}
$sql = "select department.dept_name,course.course_id,course.c_name,faculty.faculty_id from course,department,faculty where department.dept_id = faculty.dept_id and course.dept_id = department.dept_id and faculty.user_id = ".$_SESSION['uid'];
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT exam_id, exam_name,descr,total_marks FROM exam";  
$result1 = mysqli_query($connection,$sql2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STMS-Add marks</title>
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
        html, body {
          height:100%;
        }
        body{
          margin: 5%; /*5% margin from all the sides of the html page */ 
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          height: 100%;
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
          //background-color: #f6ead4 ;
          background-color: whitesmoke ;
          border-radius: 10px;
          z-index: 1;
        }
        button.btn-primary {
          background-image: linear-gradient(315deg, #21d190 0%, #d65bca 74%);
          color: whitesmoke;
          width: 25.2 em;
          border: none;
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
        $(document).ready(function(){
        // jQuery methods go here...
          $(".course").change(function(){
            //alert("course: " + $(".course").val());
            $(".sem").load("demo_test_post.php",
            {
              course_id: $(".course").val()
            } /* ,
            function(data,status){
              alert("\nStatus: " + data);
            } */ );
          });

          $(".sem").change(function(){
            //alert("course: " + $(".course").val());
            $(".subject").load("demo_test_post.php",
            {
              cid: $(".course").val(),
              fid: <?php echo$row['faculty_id']?>,
              sem: $(".sem").val()
            } /* ,
            function(data,status){
              alert("Data: " + data);
            }  */);

            $(".subject").html("<option value=''>Select Subject</option>"); 
            if ($(".course").val()==='' || $(".sem").val()=='') {
              //alert('nothing!');
              $(".student").html("<option value=''>No students</option>"); 
            }
            else {
              $('.student').load("demo_test_post.php",
              {
                cid: $(".course").val(),
                sem: $(".sem").val()
              } /* ,
              function(data,status) {
                alert(status);
              }  */);
            }
          });


          $(".exam").change(function(){
            //alert("course: " + $(".course").val());
            $('.obtained_marks').val('');
            $("#total_marks").load("demo_test_post.php",
            {
              eid: $(".exam").val()
            } ,
            function(data,status){
              //alert("\nStatus: " + status);
              $("#total_marks").val(data);
              marks = data.split(' ');
              $('.obtained_marks').attr('max',marks[0]);
            } );
          });
        });
  </script>
</head> 

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
            <div class="dropdown-menu">
                <span class="decorate"><a class="dropdown-item" href="addsubject.php">Add Subject</a></span>
                <span class="decorate"><a class="dropdown-item" href="addmarks.php">Add Marks</a></span>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Report
            </a>
            <div class="dropdown-menu">
              <span class="decorate"><a class="dropdown-item" href="#">Subject Reports</a></span>
              <span class="decorate"><a class="dropdown-item" href="#">Search Result</a></span>
              <span class="decorate"><a class="dropdown-item" href="#">Student Reports</a></span>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav dropdown ml-auto">
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop"  data-toggle="dropdown">
              <img src="/STMS/res/user<?php echo$_SESSION['uid'];?>.jpg" width="30px" height="30px" style="border-radius:50%;"/>&nbsp;&nbsp;
              Welcome&nbsp;<?php echo$_SESSION['name'];?>&nbsp;!
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <span class="decorate"><a class="dropdown-item" href="account.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a></span>
                <span class="decorate"><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Log out</a></span>
              </div>
            </li>
        </ul>
    </nav>
   
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET" class="center" novalidate id="needs-validation">
        <div class="table-responsive">  
          <table class="table table-hover table-bordered">
          <thread class="thread-dark"></thread>
          <tr>
            <th scope="col">Roll No</th>
            <th scope="col">Name</th>
            <th scope="col">CE-I  10 Marks</th>
            <th scope="col">CE-I 15 Marks</th>
            <th scope="col">CE-II 25 Marks</th>
            <th scope="col">ESE 50 Marks</th>
            <!-- <th scope="col">Total</th> -->
          </tr>
          </table>
        </div>


      

      
      <!-- <div class="form-group row">
      <label for="add_subject" class="col-sm-2 col-form-label" ></label>
        <div class="col-sm-3">
          <button type="submit" name="add" class="btn btn-primary" value="add" >Upload marks</button>
        </div>
      </div> -->

<?php
/* 
if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET['add']) )
{
  $cid = test_input($_GET["course"]);
  $sem = test_input($_GET["sem"]);
  $subject = test_input($_GET["subject"]);
  $student = test_input($_GET["student"]);
  $exam = test_input($_GET["exam"]);
  $score = test_input($_GET["score"]);

  $sql = "SELECT COUNT(r_id) from result where sub_id=$subject and s_id=$student and exam_id=$exam";
  $result = mysqli_query($connection,$sql);
  $count = mysqli_fetch_row($result);

  if ($count[0]==0)
  {
    // $get_fid_query = "SELECT faculty_id from faculty where user_id=".$_SESSION['uid'];
    // $result = mysqli_query($connection,$get_fid_query);
    // $row = mysqli_fetch_assoc($result);
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO result(s_id, sub_id, exam_id, score, uploaded_on) VALUES($student, $subject, $exam, $score,'".$date."')";
    if (mysqli_query($connection, $sql)) {?>

      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Marks uploaded successfyully.
        <?php header("refresh:0");?>
      </div>
    
      <?php } else {?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> Marks could not be uploaded!<?php echo mysqli_error($connection);?>
        </div>
    <?php }
  } else {?>
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error!</strong> Record already exists! 
    </div>
<?php } 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  //echo $data."<br>";
  return $data;
} */
mysqli_close($connection);
?>
    </form> 
  </body>    
</html>