<?php
session_start();
include '_bootstrap_cdn.php';
include '_navbar.php';
include "_connection.php";

session_unset();
session_destroy();
header('Location: login.php');
?>