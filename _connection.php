<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "logindb";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Connection Failed");
}
// else{
//     echo "Connection Successfull";
// }
?>