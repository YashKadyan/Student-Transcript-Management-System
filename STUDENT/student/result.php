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
=======
    $connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
    session_start();
    if (!$connection) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
>>>>>>> be24171 (README.md file committed!)
    if(!isset($_SESSION['uid']))
    {
    echo"<script>alert('Unauthorised access!!!');</script>";
    die();
    }
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Result</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="./dashboard.php" class="simple-text">
                Hello <?php echo$_SESSION['name']?> !
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a class="nav-link" href="./dashboard.php">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
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
                <li class="nav-item active">
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
                    <!--<li>
                        <a class="nav-link" href="./icons.html">
                            <i class="nc-icon nc-atom"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
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
                    <a class="navbar-brand" href="#pablo"> Result </a>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Result</h4>
                                    <p class="card-category">Semester - <?php echo$_SESSION['semester']?></p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Subject</th>
                                            <th>CE-I</th>
                                            <th>CE-II</th>
                                            <th>ESE</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            <?php 
<<<<<<< HEAD
                                                $sql = "SELECT * FROM subject WHERE semester=".$_SESSION['semester']." AND course_id=".$_SESSION['cid'];
=======
                                                $sql = "select * from subject where semester=".$_SESSION['semester']." and course_id=".$_SESSION['cid'];
>>>>>>> be24171 (README.md file committed!)
                                                $result = mysqli_query($connection,$sql);
                                        
                                                while($subject_row = mysqli_fetch_assoc($result))
                                                {
                                                    $sql = "select result.exam_id,score from result,exam where PRN=".$_SESSION['PRN']." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='CE_I'";
                                                    $result1 = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($result1);
                                                    echo"<tr>";
                                                    echo"<td>".$subject_row['sub_name']."</td>";
                                                    echo"<td>".$row['score']."</td>";
                                                    $ex_cnt = 0;
                                                    if($row['score']!=NULL) {
                                                        $ce1 = $row['score'];
                                                        $ex_cnt++;
                                                    }


                                                    $sql = "select result.exam_id,score from result,exam where PRN=".$_SESSION['PRN']." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='CE_II'";
                                                    $result1 = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($result1);
                                                    echo"<td>".$row['score']."</td>";
                                                    if($row['score']!=NULL) {
                                                        $ce2 = $row['score'];
                                                        $ex_cnt++;
                                                    }
                                                    
                                                    $sql = "select result.exam_id,score from result,exam where PRN=".$_SESSION['PRN']." and sub_id=".$subject_row['sub_id']." AND result.exam_id=exam.exam_id AND exam_name='ESE'";
                                                    $result1 = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($result1);
                                                    echo"<td>".$row['score']."</td>";
                                                    if($row['score']!=NULL) {
                                                        $ese= $row['score'];
                                                        $ex_cnt++;
                                                    }
                                                    if ($ex_cnt==3)
                                                    {
                                                        $total = $ce1+$ce2+$ese;
                                                        echo"<td>".$total."</td>";
                                                    }
                                                    echo"</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<<<<<<< HEAD
        <div class="text-center">
            <a class="btn btn-info btn-fill" href="generateresult.php" target="_blank">Download Result</a>
        </div>
=======
>>>>>>> be24171 (README.md file committed!)
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
                            <a href="#http://www.creative-tim.com">Fergussonian</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

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
