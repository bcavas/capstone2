<?php 
	session_start();

	$val = $_POST["val"];
	echo "

			<div class='form-group'>
				<input type='hidden' name='adId' value='" . $val . "'>				
				<label for='phone' class='col-sm-2 control-label'>Phone Number:</label>
				<div class='col-sm-7 col-md-7'>
				  <input type='text' class='form-control' id='phone' name='phone' value='" . $_SESSION['phone'][$val] . "' required>
				</div>
			</div>

			<div class='form-group'>
				<label for='address' class='col-sm-2 control-label'>Street Address:</label>
				<div class='col-sm-7 col-md-7'>
				  <input type='text' class='form-control' id='address' name='address' value='" . $_SESSION['address'][$val] . "' required>
				</div>
			</div>

			<div class='form-group'>
				<label for='city' class='col-sm-2 control-label'>City:</label>
				<div class='col-sm-7 col-md-7'>
				  <input type='text' class='form-control' id='city' name='city' value='" . $_SESSION['city'][$val] . "'required>
				</div>
			</div>

			<div class='form-group'>
				<label for='zip' class='col-sm-2 control-label'>Zip Code:</label>
				<div class='col-sm-7 col-md-7'>
				  <input type='text' class='form-control' id='zip' name='zip' value='" . $_SESSION['zipCode'][$val] . "'required>
				</div>
			</div>

			<div class='form-group'>
				<div class='col-sm-offset-2 col-sm-10'>
				  <button type='submit' class='btn btn-success'>Update Record</button>
				</div>
			</div>
	";