<?php

session_start();

$userId = $_SESSION["id"];
$fname = $_POST["fName"];
$lname = $_POST["lName"];
$email = $_POST["email"];

require '../../partials/db_config.php';

$updUser = "UPDATE users SET firstName = '$fname', lastName = '$lname', email = '$email' WHERE userID = '$userId';";
$updUserResult = mysqli_query($conn, $updUser);
$userRow = mysqli_fetch_assoc($updUserResult);

$_SESSION["email"] = $userRow["email"];
$_SESSION["fname"] = $userRow["firstName"];
$_SESSION["lname"] = $userRow["lastName"];

// check if query is successful
if ($updUserResult) {
	header ('location:../../editContact.php?update=yes'); 
}
else {
	echo "Update Failed" . mysqli_error($conn);
}
