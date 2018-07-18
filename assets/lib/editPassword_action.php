<?php

require '../../partials/db_config.php';

$userId = $_POST["id"];
$oldPw = sha1($_POST["oldPw"]);
$password = sha1($_POST["password"]);

$pwCheck = "SELECT * FROM users WHERE userID = '$userId' AND password = '$oldPw';";
$pwCheckResult = mysqli_query($conn, $pwCheck);

	if (mysqli_fetch_assoc($pwCheckResult) > 0){
		$pwUpd = "UPDATE users SET password = '$password' WHERE userID = '$userId';";
		$pwUpdResult = mysqli_query($conn, $pwUpd);
			if ($pwUpdResult){
			header ('location:../../editPassword.php?update=yes');
			} else {
				echo "Update Failed" . mysqli_error($conn);
			}
	} else {
		echo "<script>alert('Incorrect password! Please try again.'); window.location.href='../../editPassword.php';</script>";
	}

