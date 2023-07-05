<?php
session_start();
session_unset();
session_destroy();
header("location:../home.html");
unset($_COOKIE);
?>