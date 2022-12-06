<?php
session_start();
error_reporting(0);
include '_bootstrap_cdn.php';
include '_navbar.php';
include "_connection.php";

if($_SESSION['loggedin'] != true){
    header('Location: login.php');
}else{
    $user = $_SESSION['username'];
    echo "<div class='container my-4'>
    <div class='alert alert-success' role='alert'>
      <h2 class='alert-heading'>Welcome $user to the about page!</h2><br>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Perspiciatis excepturi tempora magni, distinctio praesentium soluta tenetur eius? Quidem, vel nisi!
      </p>
    </div>";
}

?>