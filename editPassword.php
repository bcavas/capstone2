<?php 

session_start();
$id = $_SESSION["id"];

if(!isset($_SESSION['name'])) {
    header('location: login.php');
  	}
 
if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  } 

require 'partials/header.php';

	function getTitle() {
		echo "Change Password";
	}

if(isset($_GET["update"])) {
	echo "<div class='alert alert-success'>
		<strong>Password Changed</strong>
			</div>"; //add address notification
	}
	    
?>


<div class="container">
	<form class="form-horizontal" method="POST" action="assets/lib/editPassword_action.php">
		
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<label for="oldPw" class="col-sm-2 control-label">Enter Current Password:</label>
				<div class="col-sm-7 col-md-7">
			  		<input type="password" class="form-control" id="oldPw" name="oldPw" required>
			  	</div>
			</div>

			<div class="form-group">
             	<label for="password" class="col-sm-2 control-label">Enter New Password:</label>
             	<div class="col-sm-7 col-md-7">
             		<input type="password" class="form-control" id="password" name="password">
             	</div>
           	</div>

  			<div class="form-group">
    		    <label for="password2" class="col-sm-2 control-label">Re-enter New Password:</label>
    		    <div class="col-sm-7 col-md-7">
    		   		<input type="password" class="form-control" id="password2" name="password2" onblur="pwCheck()">
            		<span id="pwMatch"></span>
            	</div>
  			</div>

  			<button type="submit" class="btn btn-default" id="submit">Submit</button>
	
	</form>
</div>




<?php include 'partials/footer.php' ;?>