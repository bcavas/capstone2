<?php

session_start();

$itemId = $_POST["itemId"];
$quantity = $_POST["quantity"];

require '../../partials/db_config.php';

$stock = "SELECT * FROM items WHERE itemID = '$itemId';";
$stockResult = mysqli_query($conn, $stock);
$stockRow = mysqli_fetch_assoc($stockResult);
$stocks = $stockRow["stocks"];
$name = $stockRow["name"];

if( $quantity > $stocks){
		echo"<strong>" . $name . " has insufficient stocks for your desired quantity.</strong>";
		echo"<script>$('#stockCheck').attr('disabled', 'disabled');</script>";
	}else {
		echo"<script>document.getElementById('stockCheck').disabled = false;</script>";
	}

