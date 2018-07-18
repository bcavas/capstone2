<?php

require '../../partials/db_config.php';

	$id = $_POST["id"];
	$name = $_POST["prodName"];
	$image = $_POST["img"];
	$description = mysqli_real_escape_string($conn, $_POST["prodDesc"]);
	$price = $_POST["price"];
	$stocks = $_POST["stocks"];
	$catId = $_POST["category"];





// update Record
$sql = "UPDATE items SET name = '$name', image = '$image', description = '$description', price = '$price', stocks = '$stocks', categoryID = '$catId' WHERE itemID = '$id';";



// check if query is successful
if (mysqli_query($conn, $sql)) {
	
	header ('location:../../admin.php?update=yes'); 
}
else {
	echo "Update Failed" . mysqli_error($conn);
}

