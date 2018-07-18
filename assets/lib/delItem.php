<?php 

$id = $_GET['id'];


require '../../partials/db_config.php';

$del = "DELETE FROM items WHERE itemID='$id';";

$result = mysqli_query($conn, $del);

if($result) {
	// echo "Record Deleted";
	header('location:../../admin.php?del=yes');
}
else {
	echo "Delete Failed" . mysqli_error($conn);
}

