<?php
session_start();

$_SESSION['username'] = null;
$_SESSION['email'] = null;


header("Location: ../index.php");
?>