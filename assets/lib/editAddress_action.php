<?php

require '../../partials/db_config.php';

	$adId = $_POST["adId"] + 1;
	$phone = $_POST["phone"];
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
	$zip = $_POST["zip"];
	$city = $_POST["city"];

// update address table
$updAd = "UPDATE address SET address = '$address', phone = '$phone' WHERE addressID = '$adId';";
$updAdResult = mysqli_query($conn, $updAd);
$adRow = mysqli_fetch_assoc($updAdResult);
array_replace($_SESSION["address"][$adId], $adRow["address"]);
array_replace($_SESSION["phone"][$adId], $adRow["phone"]);

//update zip table
$updZip = "UPDATE zip SET zipCode = '$zip' WHERE zipID = (SELECT zipID FROM address WHERE addressID = '$adId');";
$updZipResult = mysqli_query($conn, $updZip);
$zipRow = mysqli_fetch_assoc($updZipResult);
array_replace($_SESSION["zipCode"][$adId], $zipRow["zipCode"]);

//update city table
$updCity = "UPDATE city SET city = '$city' WHERE cityID = (SELECT cityID FROM zip WHERE zipID = (SELECT zipID FROM address WHERE addressID = '$adId'));";
$updCityResult = mysqli_query($conn, $updCity);
$cityRow = mysqli_fetch_assoc($updCityResult);
array_replace($_SESSION["city"][$adId], $cityRow["city"]);

// check if query is successful
if ($updAdResult && $updZipResult && $updCityResult) {

	header ('location:../../editAddress.php?update=yes'); 
}
else {
	echo "Update Failed" . mysqli_error($conn);
}

