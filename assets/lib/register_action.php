<?php

//connect to db
require '../../partials/db_config.php';

$uname = mysqli_real_escape_string($conn, $_POST["username"]);
$pass = sha1($_POST["password"]); 
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);

//SQL statement for account creation
$sql = "INSERT INTO users (username, password, email, firstName, lastName)
VALUES ('$uname', '$pass', '$email', '$fname', '$lname');";

$result = mysqli_query($conn, $sql); 

echo "<script>alert('Congratulations! Your account has been created. You will now be redirected to the login page.'); window.location.href='../../login.php';</script>";

?>

