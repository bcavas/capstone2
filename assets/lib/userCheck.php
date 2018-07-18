<?php
$uname = $_POST["uname"];
require '../../partials/db_config.php';

//SQL statement for checking duplicate usernames
$dupeUser = "SELECT * FROM users WHERE username = '$uname';";
$checkUser = mysqli_query($conn, $dupeUser);


	if(mysqli_num_rows($checkUser) > 0){
		echo"<strong>Username already exists</strong>";
		echo"<script>$('#submit').attr('disabled', 'disabled');</script>";
	}else{
		echo"<u>Username is available</u>";
		echo"<script>document.getElementById('submit').disabled = false;</script>";
	}

?>