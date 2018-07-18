<?php

session_start();

$userId = $_SESSION["id"];

if(!isset($_SESSION['name'])) {
    header('location: login.php');
  } 

if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  }   

require 'partials/header.php';

	function getTitle() {
		echo "User Details";
	}

?>

<div class="container" style="margin-top:60px">
        <h1>Account Information</h1>
        <a href="assets/lib/delUser.php"><button type="button" class="btn btn-danger">Deactivate Account</button></a>
        <div class="row">
            <div class="col-md-5">
                <h3>Contact Information</h3><a href="editContact.php"><button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i>Edit Contact Info</button></a><hr>
                
                <p id="uName">Username: <?php echo $_SESSION['name'] ?></p>
                <p id="fName">First Name: <?php echo $_SESSION['fname'] ?></p>
                <p id="lName">Last Name: <?php echo $_SESSION['lname'] ?></p>
                <p id="email">Email: <?php echo $_SESSION['email'] ?></p>
                <a href="editPassword.php"><button type="button" class="btn btn-warning">Change Password</button></a>

            </div>

            <div class="col-md-7">
                <h3>Address Book</h3>
                <a href="addAddress.php"><button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i>Add an Address</button></a>
                <a href="editAddress.php"><button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i>Edit Saved Addresses</button></a><hr>

                <h4>Saved Addresses</h4>

                    <?php                        
                        if(count($_SESSION["address"]) > 0){
                            for($x=0; $x < count($_SESSION["address"]); $x++){
                                echo "<p>Phone Number: " . $_SESSION['phone'][$x] . "</p>";
                                echo "<p>Address: " . $_SESSION['address'][$x] . "</p>";
                                echo "<p>City: " . $_SESSION['city'][$x] . "</p>";
                                echo "<p>Zip Code: " . $_SESSION['zipCode'][$x] . "</p>";
                                echo "<hr>";
                            }
                        } else {
                                    echo "<p>You have not saved any address yet.</p>";
                            }
                    ?>
                    
            </div>
        </div>

        <h2>Order History</h2><hr>
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
                <?php
                    require 'partials/db_config.php';
                    $userOrders = "SELECT * FROM orders WHERE userID = '$userId';";
                    $userOrdersResult = mysqli_query($conn, $userOrders);

                    if (mysqli_num_rows($userOrdersResult) > 0){
                        while ($userOrdersRow = mysqli_fetch_assoc($userOrdersResult)){
                            //save order details into variables
                            $orderId = $userOrdersRow["orderID"];
                            $adId = $userOrdersRow["addressID"];
                            $orderDate = $userOrdersRow["orderDate"];
                            $total = $userOrdersRow["total"];
                            $statusId = $userOrdersRow["statusID"];
                            $refNo = $userOrdersRow["refNo"];

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

                            echo "<h3>Reference Number: <button type='button' id='toggle' class='btn btn-info' onclick='orderBreakdown($orderId)'>" . $refNo . "</button></h3>
                                <h4>Order Date: " . $orderDate . "</h4>
                                <h4>Status: " . $orderStatus . "</h4>
                                <h4>Total: $" . $total . "</h4>
                                <h5>Ship To: " . $shipAd .", " . $shipZip . ", " . $shipCity . "</h5>
                                <div id='showDetails$orderId' class='row'>
                                    
                                </div><hr>";


                        }
                    }
                ?>
            </div> 
        </div>         
</div>

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
    


    <?php include 'partials/footer.php'; ?>