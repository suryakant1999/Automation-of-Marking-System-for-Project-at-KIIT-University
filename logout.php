<?php

session_start();
echo $_SESSION['username'];
session_destroy();

header("location:login.php");
?>