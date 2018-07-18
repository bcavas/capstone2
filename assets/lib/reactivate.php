<?php

$uname = $_POST["uname"];
$pw = sha1($_POST["pw"]);

require '../../partials/db_config.php';

$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pw';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0){
	$updStatus = "UPDATE users SET status = 'active' WHERE username = '$uname';";
	$updStatusResult = mysqli_query($conn, $updStatus);
	echo "<script>alert('Congratulations! Your account has been reactivated. You will now be redirected to the login page.'); window.location.href='../../login.php';</script>";

}else if (mysqli_num_rows($result)==0){
	echo "<script>alert('Incorrect username and password combination. Please try again.');
		window.location.href='../../login.php';</script>";
}else{
	echo "Reactivation Failed" . mysqli_error($conn);
}