<?php

session_start();
require '../../partials/db_config.php';

$user = $_SESSION["id"];
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$city = $_POST["city"];
$zip = $_POST["zip"];
$phone = $_POST["phone"];


$cityCheck = "SELECT * FROM city WHERE city='$city';"; //check if user's city already exists
$cityResult = mysqli_query($conn, $cityCheck);

$zipCheck = "SELECT zipCode FROM zip WHERE zipCode='$zip';"; //check if zip code already exists
$zipResult = mysqli_query($conn, $zipCheck);

	if(mysqli_num_rows($cityResult) == 0){
		//perform this if user's city is not on record yet
		$createCity = "INSERT INTO city (city) VALUES ('$city');";
		$createCityResult = mysqli_query($conn, $createCity);

		$selCity = "SELECT cityID FROM city WHERE city = '$city';";
		$selCityResult = mysqli_query($conn, $selCity);
		$cityRow = mysqli_fetch_assoc($selCityResult);
		$cityId = $cityRow["cityID"];
		array_push($_SESSION["city"], $cityRow["city"]);

		$createZip = "INSERT INTO zip (zipCode, cityID) VALUES ('$zip', '$cityId');";
		$createZipResult = mysqli_query($conn, $createZip);

		$selZip = "SELECT zipID FROM zip WHERE zipCode = '$zip';";
		$selZipResult = mysqli_query($conn, $selZip);
		$zipRow = mysqli_fetch_assoc($selZipResult);
		$zipId = $zipRow["zipID"];
		array_push($_SESSION["zipCode"], $zipRow["zipCode"]);

		$createAddress = "INSERT INTO address (address, zipID, userID, phone) VALUES ('$address', '$zipId', '$user', '$phone');";
		$createAddressResult = mysqli_query($conn, $createAddress);
		$addressRow = mysqli_fetch_assoc($createAddressResult);
		array_push($_SESSION["address"], $addressRow["address"]);
		array_push($_SESSION["phone"], $addressRow["phone"]);

		if($createAddressResult) {
			// add address notification
			header('location:../../addAddress.php?add=yes');
		}
		else {
			echo "Add Failed" . mysqli_error($conn);
		}
	} 

	else if(mysqli_num_rows($cityResult) > 0 && mysqli_num_rows($zipResult) == 0){ //perform this if city already exists but zip doesn't
		$cityRow = mysqli_fetch_assoc($cityResult);
		$cityId = $cityRow["cityID"];
		array_push($_SESSION["city"], $cityRow["city"]);

		$createZip = "INSERT INTO zip (zipCode, cityID) VALUES ('$zip', '$cityId');";
		$createZipResult = mysqli_query($conn, $createZip);

		$selZip = "SELECT zipID FROM zip WHERE zipCode = '$zip';";
		$selZipResult = mysqli_query($conn, $selZip);
		$zipRow = mysqli_fetch_assoc($selZipResult);
		$zipId = $zipRow["zipID"];
		array_push($_SESSION["zipCode"], $zipRow["zipCode"]);

		$createAddress = "INSERT INTO address (address, zipID, userID, phone) VALUES ('$address', '$zipId', '$user', '$phone');";
		$createAddressResult = mysqli_query($conn, $createAddress);
		$addressRow = mysqli_fetch_assoc($createAddressResult);
		array_push($_SESSION["address"], $addressRow["address"]);
		array_push($_SESSION["phone"], $addressRow["phone"]);

		if($createAddressResult) {
			// add address notification
			header('location:../../addAddress.php?add=yes');
		}
		else {
			echo "Add Failed" . mysqli_error($conn);
		}
	}

	else if (mysqli_num_rows($cityResult) > 0 && mysqli_num_rows($zipResult) > 0){
		$cityRow = mysqli_fetch_assoc($cityResult);
		$cityId = $cityRow["cityID"];
		array_push($_SESSION["city"], $cityRow["city"]);

		$zipRow = mysqli_fetch_assoc($zipResult);
		$zipId = $zipRow["zipID"];
		array_push($_SESSION["zipCode"], $zipRow["zipCode"]);

		$createAddress = "INSERT INTO address (address, zipID, userID, phone) VALUES ('$address', '$zipId', '$user', '$phone');";
		$createAddressResult = mysqli_query($conn, $createAddress);
		$addressRow = mysqli_fetch_assoc($createAddressResult);
		array_push($_SESSION["address"], $addressRow["address"]);
		array_push($_SESSION["phone"], $addressRow["phone"]);

		if($createAddressResult) {
			// add address notification
			header('location:../../addAddress.php?add=yes');
		}
		else {
			echo "Add Failed" . mysqli_error($conn);
		}
	}
			

