<?php
error_reporting(0);
include '_bootstrap_cdn.php';
include '_navbar.php';
include "_connection.php";

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if(empty($username) || empty($password) || empty($cpassword)){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please fill out all the fields
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}else{
    if($password == $cpassword){
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO logintb(username, password) VALUES ('$username', '$pass_hash')";
        if(mysqli_query($conn, $sql)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> Signup successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> to signup
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Password should match
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
}
?>

<form action="signup.php" method="POST">
    <div class="container my-4">
        <h1>Singup</h1>
        <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="username" name="username" class="form-control" id="username" placeholder="Username">
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="mb-3">
        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password">
        </div>
        <div class="mb-3">
        <input type="submit" class="form-control bg-primary text-white" value="Submit">
        </div>
    </div>
</form>