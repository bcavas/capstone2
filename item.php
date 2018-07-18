<?php
session_start();
$id = $_GET["id"];

if(!isset($_SESSION['name'])) {
    header('location: login.php');
  }

if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  } 

//connect to the database
require 'partials/db_config.php' ;

$sql = "SELECT * FROM items WHERE itemID = '$id'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if(mysqli_num_rows($result) > 0){
  $counter = 0;
  while($row = mysqli_fetch_assoc($result)){
    $name = $row["name"];
    $id =  $row["categoryID"];
    $price =  $row["price"];
    $image =  $row["image"];
    $description =  $row["description"];
  }
}

// echo $name;

function getTitle() {
		echo "Product Details";
	}

	require 'partials/header.php';
?>
	
	<div class="container" style="margin-top:60px">
        <h1>View Product</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="panel"><img class="img-thumbnail" src="<?php echo $image;?>"></div>
            </div>

            <div class="col-md-8">
                <h2><?php echo $name;?><hr></h2>
                    <?php echo $description;?>
                    <h4>$<?php echo $price;?></h4>

                    <button class="btn btn-primary btn-lg" onclick="addToCart(<?php echo $id ?>)">Add to Cart</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        
      function addToCart(itemId){
      var quantity = 1;
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

    </script>