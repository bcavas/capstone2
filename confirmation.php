<?php

session_start();

if(!isset($_SESSION['name'])) {
    header('location: login.php');
} 

if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  } 

function getTitle() {
    echo "Order Confirmation";
}

include 'partials/header.php';

//collect all variables to be inserted into orders table
$userId = $_SESSION["id"];
$adId = ($_POST["shipTo"]) + 1;
$orderDate = $_POST["orderDate"];
$refNo = $_POST["refNo"];
$total = $_SESSION["grandtotal"];


require 'partials/db_config.php';

//query to insert order details into orders table
$createOrder = "INSERT INTO orders (userID, addressID, orderDate, total, refNo) VALUES ('$userId', '$adId', '$orderDate', '$total', '$refNo');";
$createOrderResult = mysqli_query($conn, $createOrder);

//query to obtain orderID
$selOrderId = "SELECT orderID FROM orders WHERE refNo = '$refNo';";
$orderIdResult = mysqli_query($conn, $selOrderId);
$orderIdRow = mysqli_fetch_assoc($orderIdResult);
$orderId = $orderIdRow["orderID"];

//query to display shipping info on order summary page
$shipTo = "SELECT * FROM address WHERE addressID = '$adId';";
$shipToResult = mysqli_query($conn, $shipTo);
$shipRow = mysqli_fetch_assoc($shipToResult);

$shipAd = $shipRow["address"];
$shipPhone = $shipRow["phone"];
$shipZipId = $shipRow["zipID"];

$getZip = "SELECT zipCode FROM zip WHERE zipID = '$shipZipId';";
$getZipResult = mysqli_query($conn, $getZip);
$zipRow = mysqli_fetch_assoc($getZipResult);

$shipZip = $zipRow["zipCode"];

$getCity = "SELECT city FROM city WHERE cityID = (SELECT cityID FROM zip WHERE zipID = '$shipZipId');";
$getCityResult = mysqli_query($conn, $getCity);
$cityRow = mysqli_fetch_assoc($getCityResult);

$shipCity = $cityRow["city"];


//query to display order breakdown and fill out item_order table
$data = "";
foreach($_SESSION['cart'] as $product_id => $quantity) {
    $itemPrice = "SELECT * FROM items where itemID = '$product_id' ";
    $itemPriceResult = mysqli_query($conn, $itemPrice);
        if(mysqli_num_rows($itemPriceResult) > 0){
            while($priceRow = mysqli_fetch_assoc($itemPriceResult)){
                $productName = $priceRow["name"];
                $price = $priceRow["price"];
                $stocks = $priceRow["stocks"];
                $stocks = $stocks - $quantity;
                                
                    //For computing the sub total and grand total
                    $subTotal = $quantity * $price;
                    
                    //create entry in item_order intermediate table
                    $createItemOrder = "INSERT INTO item_order (itemID, quantity, subtotal, orderID) VALUES ('$product_id', '$quantity', '$subTotal', '$orderId');";
                    $createItemOrderResult = mysqli_query($conn, $createItemOrder);

                    //update stocks in item table
                    $updateStocks = "UPDATE items SET stocks = '$stocks' WHERE itemID = '$product_id';";
                    $updateStocksResult = mysqli_query($conn, $updateStocks);

                    $data .=
                        "<tr>
                            <td>$productName</td>
                            <td>$price</td>
                            <td>$quantity</td>
                            <td>$subTotal</td>                              
                        </tr>";
                }
            }
}


?>

<h1>Thank you for being a customer!</h1>
<h2>Your order is on its way.</h2>

<div class="container">

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h2>SUMMARY:</h2>
			<h4>Reference No: <?php echo $refNo; ?></h4>
			<h4>Order Date: <?php echo $orderDate; ?></h4>
			<h4>Order Total: $<?php echo $_SESSION["grandtotal"]; ?></h4>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h2>SHIPPING DETAILS:</h2>
			<h4>Phone: <?php echo $shipPhone; ?></h4>
			<h4>Address: <?php echo $shipAd; ?></h4>
			<h4>City: <?php echo $shipCity; ?></h4>
			<h4>ZIP Code: <?php echo $shipZip; ?></h4>			
		</div>

	</div>

	<hr>

	<div class="row">
		<div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
			<table class='table table-striped table-responsive'>
    			<thead>
      				<tr>
        				<th>Product</th>
        				<th>Price</th>
        				<th>Quantity</th>
        				<th>Sub-Total</th>        	
      				</tr>
      				
    			</thead>

    			<tbody>
    				<?php echo $data; ?>
    			</tbody>
    		</table>
		</div>
	</div>

</div>

<script type="text/javascript">

//unset cart after shopping
$(document).ready(function(){
          $.ajax({
              url:"./assets/lib/doneShopping.php", 
              
                dataType:"text",
                  success:function(data, status){
                  $('a[href="cart.php"]').html(data);
            }
          })
    })    

</script>

<?php 
    include 'partials/footer.php'; 
?>;