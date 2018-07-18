<?php 
	session_start();

	if(!isset($_SESSION["cart"])){
    // create session variable for cart
    $_SESSION['cart'] = array();
}

	if(!isset($_SESSION["item_count"])){
    // create session variable for item counter
    $_SESSION['item_count'] = 0;
}

if(!isset($_SESSION['name'])) {
    header('location: login.php');
  }

if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  } 

	function getTitle() {
		echo "Catalogue";
	}

	require './partials/header.php';
?>





<div class="container" style="margin-top:60px">
<h2>Categories</h2><hr>
      <div class="row">
          <div class="col-md-2">
            <!-- <p class="lead">The Cardboard Connoisseur</p> -->
                <div class="list-group"> <!-- Display Categories Starts Here-->
                        <?php
                        //connect to the database
                        require './partials/db_config.php' ;
                        $sql = "SELECT * FROM category ";
                        $result = mysqli_query($conn, $sql);
                        $data = "";
                            if(mysqli_num_rows($result) > 0){
                              while($row = mysqli_fetch_assoc($result)){
                                $id = $row["categoryID"];
                                $description = $row["description"];
                                $data .= "
                                      <a href='#' id=$id class='list-group-item'>$description</a>";
                              }
                            }
                        echo $data;
                        ?>
                </div><!-- Display Categories Ends Here-->
          </div>

          <div class="col-md-10" id="products"> <!-- Display Products Starts here -->
            <div class="row" id="panel">
                <?php
                    //connect to the database
                    require './partials/db_config.php' ;

                    $sql = "SELECT * FROM items";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0){
                      $counter = 0;
                      while($row = mysqli_fetch_assoc($result)){
                        $counter = $counter+1;
                        $id =$row["itemID"];
                        echo "
                          <div class='col-sm-6 col-md-4'>
                            <div class='thumbnail'>
                              <img style='width:200px;height:200px;' src='$row[image]' alt='$row[name]'>
                              <div class='caption'>
                                <h3><a href='item.php?id=$row[itemID]'>$row[name]</a></h3>
                                <p>Stocks Available:<strong>$row[stocks]</strong></p>
                                <p>$ $row[price]</p>
                                    <div class='form-group'>
                                      <input class='form-control' id='quantity$id' onchange='stockCheck($id)' type='number' min='0' value='0'>
                                    </div>
                                    <span id='stockCheck$id'></span>
                                    <div class='form-group'>
                                      <button id='submit$id' class='btn btn-primary btn-block btn-lg' role = 'button'  onclick='addToCart($id)'' ><span class='glyphicon glyphicon-shopping-cart'></span>Add to Cart</button>
                                    </div>
                              </div>
                            </div>
                          </div>";
                      }
                    };
                  ?>
            </div>
          </div><!-- Display Products Ends here -->
      </div>

</div>

<script type="text/javascript">

//filter catalogue by product category
$(document).on("click", ".list-group-item", function () {
      var catID = $(this).attr('id');
      // console.log(catID);
            
      $.ajax({
          url:"./assets/lib/catFilter.php", 
          method:"POST",
          data:
                {
                  id: catID
                },
          dataType:"text",
          success:function(data, status){
              $("#panel").html(data);
          }
      });
});

function addToCart(itemId){
      var quantity = $("#quantity"+itemId).val();
      console.log("This is item ID:" + itemId);
      console.log("This is the quantity:" + quantity);

          $.ajax({
              url:"assets/lib/add_to_cart.php", 
              method:"POST",
              data:
                    {
                      item_id: itemId,
                      item_quantity: quantity
                    },
                dataType:"text",
                  success:function(data, status){
                  $('a[href="cart.php"]').html(data);
            }
          })
    }

function stockCheck(itemId){
      var itemId = itemId
      var quantity = $("#quantity"+itemId).val();
      console.log("item id: " + itemId + " quantity: " + quantity);

          $.ajax({
            url:"assets/lib/stockCheck.php",
            method:"POST",
            data: 
                  {
                    itemId: itemId,
                    quantity: quantity
                  },
            dataType:"text",
            success:function(data){
            $("#stockCheck"+itemId).html(data);
            }
          })
}

</script>

<?php
	require './partials/footer.php';
	
?>