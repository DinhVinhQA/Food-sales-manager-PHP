<?php
 session_start();
$_SESSION['loginAdmin'] = null;
header("location:login.php");
?>
