<?php

$uname = $_POST["uname"];

require '../../partials/db_config.php';

$sql = "SELECT status FROM users WHERE username = '$uname';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
	while($statusRow = mysqli_fetch_assoc($result)){
		$status = $statusRow["status"];

		if($status == "deactivated"){
			//modal trigger to require password before reactivation
			echo "<a href='#reactivate' data-toggle='modal'>User account deactivated. Click to reactivate.</a>";
			//deactivate submit button in the meantime
			echo"<script>$('#submit').attr('disabled', 'disabled');</script>";
			//modal
			echo "<div class='modal fade' id='reactivate' role='dialog'>
    			<div class='modal-dialog'>";
    		//modal content
    		echo "<div class='modal-content'>
        			<div class='modal-header'>
          				<button type='button' class='close' data-dismiss='modal'>&times;</button>
          				<h4 style='color:red;'><span class='glyphicon glyphicon-lock'></span> Reactivate Account</h4>
        			</div>

        			<div class='modal-body'>
          			<form role='form' method='POST' action='assets/lib/reactivate.php'>
            			<div class='form-group'>
              				<label for='uname'><span class='glyphicon glyphicon-user'></span> Username</label>
              				<input type='text' class='form-control' id='uname' name='uname' placeholder='Enter username'>
            			</div>

            			<div class='form-group'>
              				<label for='pw'><span class='glyphicon glyphicon-eye-open'></span> Password</label>
              				<input type='text' class='form-control' id='pw' name='pw' placeholder='Enter password'>
            			</div>

            			<button type='submit' class='btn btn-default btn-success btn-block'><span class='glyphicon glyphicon-off'></span> Reactivate</button>
          			</form>
        			</div>

        			<div class='modal-footer'>
          			<button type='submit' class='btn btn-default btn-default pull-left' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Cancel</button>
          			</div>
          		</div>
          	</div>
        </div>";
		} else if ($status == "active"){
			echo"<u>Account is active</u>";
			echo"<script>document.getElementById('submit').disabled = false;</script>";
		}
	}
} else {
	//username not found, redirect to registration page
	echo "<a href='register.php'>Username not found, register it here.</a>";
	echo"<script>$('#submit').attr('disabled', 'disabled');</script>";
}