<?php

session_start();
require '../../partials/db_config.php';

$name = mysqli_real_escape_string($conn, $_POST["itemName"]);
$description = mysqli_real_escape_string($conn, $_POST["itemDesc"]);
$image = $_POST["img"];
$price = $_POST["price"];
$category = $_POST["category"];


$sql = "INSERT INTO items (name, image, description, price, categoryID)
VALUES ('$name', '$image', '$description', '$price', '$category');";


$result = mysqli_query($conn, $sql); 

if($result) {
	// echo "Product Added";
	header('location:../../admin.php?add=yes');
}
else {
	echo "Add Failed" . mysqli_error($conn);
}