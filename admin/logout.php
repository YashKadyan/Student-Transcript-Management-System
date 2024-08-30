<?php
session_start();
session_unset();
session_destroy();
header("location:/STMS/home.html");
unset($_COOKIE);
?>