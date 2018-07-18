<?php
$email = $_POST["email"];
require '../../partials/db_config.php';

//SQL statement for checking duplicate emails
$dupeEmail = "SELECT * FROM users WHERE email = '$email';";
$checkEmail = mysqli_query($conn, $dupeEmail);

	if(mysqli_num_rows($checkEmail) > 0){
		echo"<strong>Email already exists</strong>";
		echo"<script>$('#submit').attr('disabled', 'disabled');</script>";
	}else{
		echo"<u>Email is available</u>";
		echo"<script>document.getElementById('submit').disabled = false;</script>";
	}

?>