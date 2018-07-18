<?php
	session_start();
	function getTitle() {
		echo "Landing Page";
	}

	//remove all session variables
	session_unset();

	//destroy the session

	session_destroy();

	echo "<script>alert('Thanks for dropping by! You have now been successfully logged out.'); window.location.href='login.php';</script>";