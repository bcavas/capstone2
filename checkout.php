<?php

session_start();

if(!isset($_SESSION['name'])) {
    header('location: login.php');
} 

if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  } 

function getTitle() {
    echo "Checkout";
}

require './partials/header.php';

require 'partials/db_config.php';



$data = "<table class='table table-striped table-responsive'>
    <thead>
      	<tr>
        	<th>Product</th>
        	<th>Price</th>
        	<th>Quantity</th>
        	<th>Sub-Total</th>        	
      	</tr>
    </thead>
    <tbody>";

$grand_total = 0;


foreach($_SESSION['cart'] as $product_id => $quantity) {
    $itemPrice = "SELECT * FROM items where itemID = '$product_id' ";
    $itemPriceResult = mysqli_query($conn, $itemPrice);
        if(mysqli_num_rows($itemPriceResult) > 0){
            while($priceRow = mysqli_fetch_assoc($itemPriceResult)){
                $productName = $priceRow["name"];
                $price = $priceRow["price"];
                                
                        //For computing the sub total and grand total
                        $subTotal = $quantity * $price;
                        $grand_total += $subTotal;

                      
                        $_SESSION["grandtotal"] = $grand_total;


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

$data .="</tbody></table>
              <hr>
              <h3 align='right'>Total: $ <span>$grand_total </span><br></a></h3>
              <hr>";

echo "<div class='container'>" . $data . "</div>";

//order reference number generator
function refNo($length = 13) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>


	<div class="container">
		<form class="form-horizontal" method="POST" action="confirmation.php">
			<div class="form-group">
        <input type="hidden" id="refNo" name="refNo" value="<?php echo refNo(); ?>"> 
        <input type="hidden" id="orderDate" name="orderDate" value="<?php echo date('Y/m/d'); ?>"> 
				<label for="shipTo" class="col-sm-2 control-label">This order will be shipped to:</label>
  			<select class="form-control col-sm-7 col-md-7" id="shipTo" name="shipTo">
          <option value="dummy">Choose a shipping address</option> 
    			<?php
    				for($x=0; $x < count($_SESSION["address"]); $x++){
    					echo "<option value = '$x'>" . $_SESSION['address'][$x] . "</option>";
    				}
    			?>		
  			</select>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="submit" class="btn btn-success btn-lg"><span class='glyphicon glyphicon-ok-sign'></span> Place Order</button>
				</div>
			</div>
		</form>
	</div>

<script type="text/javascript">
  $(document).ready(function(){
  var address = document.getElementById("shipTo").value;
  console.log(address);
  if(address == "dummy"){
    document.getElementById("submit").disabled = true;
  }else{
    document.getElementById("submit").disabled = false;
  }
})

  $("#shipTo").change(function(){
    var address = document.getElementById("shipTo").value;
  console.log(address);
  if(address == "dummy"){
    document.getElementById("submit").disabled = true;
  }else{
    document.getElementById("submit").disabled = false;
  }
  })
</script>

<?php include 'partials/footer.php' ?>;