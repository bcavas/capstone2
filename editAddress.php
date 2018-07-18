<?php
session_start();

if(!isset($_SESSION['name'])) {
    header('location: login.php');
  } 

if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  } 

require 'partials/header.php';

	function getTitle() {
		echo "Edit Address";
	}

if(isset($_GET["update"])) {
	echo "<div class='alert alert-success'>
		<strong>Address Updated</strong>
			</div>"; //add address notification
}
	    
?>

	<div class="container">

		<div class="form-group">
  			<label for="adOption" class="col-sm-2 control-label">Select address to edit:</label>
  			<select class="form-control col-sm-7 col-md-7" id="adOption" name="adOption">
    			<?php
    				for($x=0; $x < count($_SESSION["address"]); $x++){
    					echo "<option value = '$x'>" . $_SESSION['address'][$x] . "</option>";
    				}
    			?>		
  			</select>
		</div>

		<form id="editAd" class="form-horizontal" method="POST" action="assets/lib/editAddress_action.php">
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
				<label for="zip" class="col-sm-2 control-label">Zip Code:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="zip" name="zip" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-success">Update Record</button>
				</div>
			</div>
		</form>
	</div>

	<script type="text/javascript">

	$(document).on("change", "#adOption", function () {
      	var optionVal = $(this).val();
      	console.log(optionVal);
            
      	$.ajax({
          	url:"./assets/lib/selectAddress.php", 
          	method:"POST",
          	data:
                {
                  val: optionVal
                },
          	dataType:"text",
          	success:function(data, status){
              	$("#editAd").html(data);
            }
        });
    });

	</script>