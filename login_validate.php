<?php

$connection =  mysqli_connect('localhost','yash','Yash@123','STMS',3306);
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
		header("location:STMSAdmin/AdminHome/AdminHome.php?login=success");
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
	header("location:home.html?login=fail");
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
?>
