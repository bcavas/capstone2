<?php

require '../../partials/db_config.php';

$statusId = $_POST["status"] + 1;
$orderId = $_POST["orderId"];
echo "order ID: " . $orderId . " status ID: " . $statusId;

//update order status
$sql = "UPDATE orders SET statusID = '$statusId' WHERE orderID = '$orderId';";
$result = mysqli_query($conn, $sql);

if($result){
	header ('location:../../adminOrders.php?update=yes');
} else {
	echo "Update Failed" . mysqli_error($conn);
}

