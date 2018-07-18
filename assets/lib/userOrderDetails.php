<?php

session_start();

$orderId = $_POST["orderId"];

require '../../partials/db_config.php';

$data = "";

$orderItem = "SELECT * FROM item_order WHERE orderID = '$orderId';";
$orderItemResult = mysqli_query($conn, $orderItem);

if (mysqli_num_rows($orderItemResult) > 0){
	while ($orderItemRow=mysqli_fetch_assoc($orderItemResult)){
		$itemId = $orderItemRow["itemID"];
		$quantity = $orderItemRow["quantity"];
		$subtotal = $orderItemRow["subtotal"];

		$itemInfo = "SELECT * FROM items WHERE itemID = '$itemId';";
		$itemInfoResult = mysqli_query($conn, $itemInfo);

		if (mysqli_num_rows($itemInfoResult) > 0){
			while ($itemInfoRow=mysqli_fetch_assoc($itemInfoResult)){
				$itemName = $itemInfoRow["name"];
				$price = $itemInfoRow["price"];

				$data .=
                        "<tr>
                            <td>$itemName</td>
                            <td>$price</td>
                            <td>$quantity</td>
                            <td>$subtotal</td>                              
                        </tr>";
			}
		}
	}
}

echo "<div class='col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3'>
        <table class='table table-striped table-responsive'>
        	<thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-Total</th>          
                </tr>
            </thead>

            <tbody>" . 
            $data .                                
            "</tbody>
        </table>
    </div>";