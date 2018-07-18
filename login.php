<?php 
	function getTitle() {
		echo "Log In";
	}

	require 'partials/header.php';
?>



<div class="container">
	<div class="row">		
		<form method="POST" action="assets/lib/login_action.php" class="col-md-6">
		  <div class="form-group">
		    <label for="username">Username:</label>
		    <input type="text" class="form-control" id="username" name="username">
		    <span id="status"></span>
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="pwd">
		  </div>
		  <button type="submit" id="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).on("blur", "#username", function(){
      var uname = $(this).val();

          $.ajax({
              url:"assets/lib/userStatusCheck.php", 
              method:"POST",
              data:
                    {
                      uname: uname
                    },
                dataType:"text",
                  success:function(data, status){
                  $("#status").html(data);
            }
          })
    })
</script>

<?php
	require 'partials/footer.php';
	
?>