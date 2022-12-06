<?php
session_start();
error_reporting(0);
include '_bootstrap_cdn.php';
include '_navbar.php';
include "_connection.php";

$username = $_POST['username'];
$password = $_POST['password'];
if(empty($username) || empty($password)){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please fill out all the fields
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}else{
    $sql = "SELECT * FROM `logintb` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = (mysqli_fetch_assoc($result));
    $hash = $row['password'];
    if(password_verify($password, $hash)){
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     <strong>Login Successfull</strong>
        //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //     </div>'; 
        header('Location: index.php');
        
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login Failed!</strong> Invalid credentials
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';  
    }
}
?>

<form action="login.php" method="POST">
    <div class="container my-4">
        <h1>Login</h1>
        <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="username" name="username" class="form-control" id="username" placeholder="Username">
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="mb-3">
        <input type="submit" class="form-control bg-primary text-white" value="Submit">
        </div>
    </div>
</form>