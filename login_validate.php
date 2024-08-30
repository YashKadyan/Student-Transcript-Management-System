<?php

<<<<<<< HEAD
$connection =  mysqli_connect('localhost','yash','Yash@123','STMS',3306);
=======
$connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
>>>>>>> be24171 (README.md file committed!)
session_start();
if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$uname = trim($_POST['username']);
$pass = $_POST['password'];
$entity = $_POST['entity'];

echo"<br>";
echo $uname;
echo"<br>";
echo $pass;
echo"<br>";
echo $entity;
echo"<br>";

if (strcmp($entity,"Faculty")==0)
{
    $sql = "Select pass,user_id from log_in, roles where roles.role_id = log_in.role_id and role_name='admin' and log_in.username='".$uname."'";
    $result = mysqli_query($connection,$sql);
	if($uid = valid($result,$pass))
	{
    	echo"<script>alert('Admin Login successfull!');</script>";
		
		$_SESSION['username'] = $uname;
		$_SESSION['uid'] = $uid;
<<<<<<< HEAD
		header("location:STMSAdmin/AdminHome/AdminHome.php?login=success");
=======
		header("location:admin/adminhome.php?login=success");
>>>>>>> be24171 (README.md file committed!)
		die();
	}
}

$sql = "Select pass,user_id from log_in, roles where roles.role_id = log_in.role_id and role_name='".strtolower($entity)."' and log_in.username='".$uname."'";
$result = mysqli_query($connection,$sql);
if($uid = valid($result,$pass))
{
	echo"<script>alert('".$entity." Login successfull!');</script>";
	$_SESSION['username'] = $uname;
	$_SESSION['uid'] = $uid;
	if(strcmp(strtolower($entity),"faculty")==0)
		header("location:faculty/faculty.php?login=success");
	elseif(strcmp(strtolower($entity),"student")==0)
	{
		header("location:STUDENT/student/dashboard.php?login=success");
	}
}
else
{
	echo"<script>alert('".$entity." Login failed!');</script>";
<<<<<<< HEAD
	header("location:home.html?login=fail");
=======
	header("refresh:3;location:home.html");
>>>>>>> be24171 (README.md file committed!)
}
	
mysqli_close($connection);

function valid($result, $pass)
{
	if(mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		if (strcmp(md5($pass),$row["pass"]) == 0)
		{
			return $row["user_id"];
		}
		return false;
	}
	return false;
}
<<<<<<< HEAD
?>
=======
/* 	session_start();
	pg_connect("host=localhost port=5432 dbname=anand user=anand") or die("Could not open connection to database server");
	$res=pg_query("SELECT password FROM client WHERE c_mail='".$_POST['username']."';");
	$val=pg_fetch_row($res);
	$pas= $val[0];
	$_SESSION['username']=$_POST['username'];
	if($res)
	{
		if(strcmp($pas,$_POST['password'])==0)
			header("location:customerhome.php?m1=success");
		else
			header("location:customer.php?m2=Failed");
	}
	else
	{
		header("location:customer.php?m2=Failed");
	}
 */
?>
>>>>>>> be24171 (README.md file committed!)
