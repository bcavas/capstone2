<?php 

session_start();

if($_SESSION['name'] != 'admin')
      header('location: login.php');

function getTitle() {
		echo "Order Management Page";
	}

require 'partials/admin_header.php';

if(isset($_GET["update"])) {
    echo "<div class='alert alert-info'>
        <strong>Order Updated</strong>
            </div>"; //update order notification
}

require 'partials/db_config.php';

$selOrders = "SELECT * FROM orders";

$selOrdersResult = mysqli_query($conn, $selOrders);

$statusOptions = ["processing", "shipped", "complete", "cancelled"];

if (mysqli_num_rows($selOrdersResult) > 0){
    while ($ordersRow = mysqli_fetch_assoc($selOrdersResult)){
    	//save order details into variables
   		$userId = $ordersRow["userID"];
    	$orderId = $ordersRow["orderID"];
    	$adId = $ordersRow["addressID"];
    	$orderDate = $ordersRow["orderDate"];
    	$total = $ordersRow["total"];
    	$statusId = $ordersRow["statusID"];
    	$refNo = $ordersRow["refNo"];

    	//get user details
    	$selUser = "SELECT * FROM users WHERE userID = '$userId';";
    	$selUserResult = mysqli_query($conn, $selUser);
    	$userRow = mysqli_fetch_assoc($selUserResult);
    	$userName = $userRow["username"];
    	$fName = $userRow["firstName"];
    	$lName = $userRow["lastName"];
    	$email = $userRow["email"];

    	//get order status
    	$selStatus = "SELECT description FROM status WHERE statusID = '$statusId';";
    	$selStatusResult = mysqli_query($conn, $selStatus);
    	$statusRow = mysqli_fetch_assoc($selStatusResult);
    	$orderStatus = $statusRow["description"];

    	//get shipping info
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

                            echo "<h3>Order Reference Number: <button type='button' class='btn btn-info' onclick='orderBreakdown($orderId)'>" . $refNo . "</button></h3>
                            	<h3>Ordered By: " . $fName . " " . $lName . "</h3>
                            	<h4>Customer Username: " . $userName . "</h4>
                            	<h4>Customer Email: " . $email . "</h4>
                            	<h4>Customer Phone: " . $shipPhone . "</h4>
                                <h4>Order Date: " . $orderDate . "</h4>
                                <h4>Grand Total: " . $total . "</h4>
                                <h4>Status: " . $orderStatus . "</h4>
                                <form class='form-horizontal' method='POST' action='assets/lib/changeStatus.php'>
                                    <div class='form-group'>
                                        <input type='text' hidden value='" . $orderId . "' name='orderId'>
                                        <label for='status' class='col-sm-2 control-label'>Select new order status:</label>
                                        <select class='form-control col-sm-7 col-md-7' id='status' name='status'>";
                                        for($x=0; $x < count($statusOptions); $x++){
                                        echo "<option value = '$x'>" . $statusOptions[$x] . "</option>";}
                                  echo "</select>
                                    </div>
                                    <button type='submit' class='btn btn-primary'>Change Status</button>
                                </form>
                                
                                <h5>Ship To: " . $shipAd .", " . $shipZip . ", " . $shipCity . "</h5>
                                <div id='showDetails$orderId' class='row'>
                                    
                                </div><hr>";


        }
    }
?>

<script type="text/javascript">
    
    function orderBreakdown(orderId){
        $.ajax({
              url:"assets/lib/userOrderDetails.php", 
              method:"POST",
              data:
                    {
                      orderId: orderId
                    },
                dataType:"text",
                  success:function(data, status){
                  $("#showDetails"+orderId).html(data);
                }
            })
    }

</script>    