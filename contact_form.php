<?php
    $connection =  mysqli_connect('localhost','yash','Yash@123','STMS',3306);
    if (!$connection) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $d = Date("Y-m-d H:i:s");
    $name = $_REQUEST['name'];
    $mail = $_REQUEST['mail'];
    $subject = $_REQUEST['subject'];
    $msg = $_REQUEST['msg'];

    $sql = "INSERT INTO contact_form(name,mail,sub,msg,date) VALUES('".$name."','".$mail."','".$subject."','".$msg."','".$d."')";

    if(mysqli_query($connection,$sql)) {
        mysqli_close($connection);
        header('location:home.html?sent=success');
    }
    else {
        mysqli_close($connection);
        header('location:home.html?sent=failed');
    }
?>
