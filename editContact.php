<?php 

session_start();

$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];

if(!isset($_SESSION['name'])) {
    header('location: login.php');
  	}

if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  }  

require 'partials/header.php';

	function getTitle() {
		echo "Edit Contact Info";
	}

if(isset($_GET["update"])) {
	echo "<div class='alert alert-success'>
		<strong>Contact Info Updated</strong>
			</div>"; //add address notification
	}
	    
?>

	<div class="container">

		<form class="form-horizontal" method="POST" action="assets/lib/editContact_action.php">
			<div class="form-group">				
				<label for="fName" class="col-sm-2 control-label">First Name:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="fName" name="fName" value="<?php echo $fname ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label for="lName" class="col-sm-2 control-label">Last Name:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="lName" name="lName" value="<?php echo $lname ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-success">Update Record</button>
				</div>
			</div>
		</form>
	</div>

<?php include 'partials/footer.php'; ?>

