<?php
<<<<<<< HEAD
    $connection =  mysqli_connect('localhost','yash','Yash@123','STMS',3306);
=======
    $connection =  mysqli_connect('localhost','anand','Happy@123','STMS',3306);
>>>>>>> be24171 (README.md file committed!)
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
<<<<<<< HEAD

    if(mysqli_query($connection,$sql)) {
        mysqli_close($connection);
        header('location:home.html?sent=success');
    }
    else {
        mysqli_close($connection);
        header('location:home.html?sent=failed');
    }
?>
=======
    if(mysqli_query($connection,$sql))
    {?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong>Your response has been sent!
        </div>
    <?php }
    else{?>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning!</strong>Your response has NOT been sent!
        </div>
    <?php echo(mysqli_error($connection));    }
?>
>>>>>>> be24171 (README.md file committed!)
