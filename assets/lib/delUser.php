<?php 
session_start();

$id = $_SESSION["id"];

require '../../partials/db_config.php';

$del = "UPDATE users SET status = 'deactivated' WHERE userID = '$id';";

$result = mysqli_query($conn, $del);

if($result) {
	// echo "Record Deleted";
	echo "<script>alert('We are sorry to see you go. Your account has now been deactivated.'); window.location.href='../../login.php';</script>";
}
else {
	echo "Deactivation Failed" . mysqli_error($conn);
}

