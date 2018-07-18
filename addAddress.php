<?php

session_start();

if(!isset($_SESSION['name'])) {
    header('location: login.php');
  } 

require 'partials/header.php';

	function getTitle() {
		echo "Add Address";
	}

if(isset($_GET["add"])) {
	echo "<div class='alert alert-success'>
		<strong>Address Saved</strong>
			</div>"; //add address notification
}

?>

<div class="container">
	<form class="form-horizontal" method="POST" action="assets/lib/addAddress_action.php">
		<div class="form-group">
			<label for="phone" class="col-sm-2 control-label">Phone Number:</label>
			<div class="col-sm-7 col-md-7">
			  <input type="text" class="form-control" id="phone" name="phone" required>
			</div>
		</div>

		<div class="form-group">
			<label for="address" class="col-sm-2 control-label">Street Address:</label>
			<div class="col-sm-7 col-md-7">
			  <input type="text" class="form-control" id="address" name="address" required>
			</div>
		</div>

		<div class="form-group">
			<label for="city" class="col-sm-2 control-label">City:</label>
			<div class="col-sm-7 col-md-7">
			  <input type="text" class="form-control" id="city" name="city" required>
			</div>
		</div>

		<div class="form-group">
			<label for="zip" class="col-sm-2 control-label">ZIP Code:</label>
			<div class="col-sm-7 col-md-7">
			  <input type="text" class="form-control" id="zip" name="zip" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
		     	<button type="submit" class="btn btn-success">Save Address</button>
			</div>
		</div>