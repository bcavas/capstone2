<?php 

  function getTitle() {
    echo "Register";
  }

	require './partials/header.php';
	
	
?>

	<body>
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
		    <form action="assets/lib/register_action.php" method="POST">
  			   <div class="form-group">
    			   <label for="username">Username:</label>
    			   <input type="text" class="form-control" id="username" name="username">
             <span id="userAvail"></span>
  			   </div>

           <div class="form-group">
             <label for="password">Password:</label>
             <input type="password" class="form-control" id="password" name="password">
           </div>

  			   <div class="form-group">
    			   <label for="password2">Re-enter Password:</label>
    			   <input type="password" class="form-control" id="password2" name="password2" onblur="pwCheck()">
             <span id="pwMatch"></span>
  			   </div>

           <div class="form-group">
             <label for="fname">First name:</label>
             <input type="text" class="form-control" id="fname" name="fname">
           </div>

           <div class="form-group">
             <label for="lname">Last name:</label>
             <input type="text" class="form-control" id="lname" name="lname">
           </div>

  			   <div class="form-group">
    			   <label for="email">Email:</label>
    			   <input type="email" class="form-control" id="email" name="email">
             <span id="emailAvail"></span>
  			   </div>
  			
  			   <button type="submit" class="btn btn-default" id="submit">Submit</button>
        </form>
      </div>
		</div>

    
	
<script type="text/javascript">



$(document).on("blur", "#username", function(){
      var uname = $("#username").val();
            
          $.ajax({
              url:"./assets/lib/userCheck.php", 
              method:"POST",
              data:
                    {
                      uname: uname
                    },
                dataType:"text",
                  success:function(data, status){
                  $("#userAvail").html(data);
            }
          })
    })

$(document).on("blur", "#email", function(){
      var email = $("#email").val();
            
          $.ajax({
              url:"./assets/lib/emailCheck.php", 
              method:"POST",
              data:
                    {
                      email: email
                    },
                dataType:"text",
                  success:function(data, status){
                  $("#emailAvail").html(data);
            }
          })
    })


</script>


<?php include './partials/footer.php';?>
