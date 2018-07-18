<?php

session_start();

$itemId = $_POST["itemId"];
$quantity = $_POST["quantity"];

require '../../partials/db_config.php';

$stock = "SELECT stocks FROM items WHERE itemID = '$itemId';";
$stockResult = mysqli_query($conn, $stock);
$stockRow = mysqli_fetch_assoc($stockResult);
$stocks = $stockRow["stocks"];

if( $quantity > $stocks){
		echo"<strong>Insufficient stocks!</strong>";
		echo"<script>$('#submit'+" . $itemId . ").attr('disabled', 'disabled');</script>";
	}else {
		echo"<script>document.getElementById('submit'+" . $itemId . ").disabled = false;</script>";
	}

