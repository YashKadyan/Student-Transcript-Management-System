<?php
session_start();
session_unset();
session_destroy();
<<<<<<< HEAD
header("location:../../home.html");
=======
header("location:/STMS/home.html");
>>>>>>> be24171 (README.md file committed!)
unset($_COOKIE);
?>