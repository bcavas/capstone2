<?php
$id = $_GET["id"];

session_start();

if($_SESSION['name'] != 'admin')
      header('location: login.php');

function getTitle() {
		echo "View Product";
	}

require './partials/admin_header.php';

require './partials/db_config.php' ;

$sql = "SELECT * FROM items WHERE itemID = '$id'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if(mysqli_num_rows($result) > 0){
  $counter = 0;
  while($row = mysqli_fetch_assoc($result)){
    $name = $row["name"];
    $catId =  $row["categoryID"];
    $price =  $row["price"];
    $image =  $row["image"];
    $description =  $row["description"];
    $stocks = $row["stocks"];
  }
}

$selCat = "SELECT description FROM category where categoryID = '$catId'";

$getCat = mysqli_query($conn, $selCat);

if($getCat) {
	while($catRow = mysqli_fetch_assoc($getCat)){
		$catDesc = $catRow["description"];
	}
}


?>
	
	<div class="container" style="margin-top:60px">
        <h1>Product Details</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="panel"><img class="img-thumbnail" src="<?php echo $image;?>"></div>
            </div>

            <div class="col-md-8">
                <h2><?php echo $name;?><hr></h2>
                    <?php echo $description;?>
                    <h4>Current Price: $<?php echo $price;?></h4>
                    <h4>Stocks available: <?php echo $stocks; ?></h4>
                    <h4>Categorized under: <?php echo $catDesc; ?></h4>

                    <a href='admin.php' class='btn btn-info' role='button'>Back to All Products</a>
					
                    
            </div>
        </div>
    </div>