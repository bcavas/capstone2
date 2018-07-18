<?php 
session_start();

if($_SESSION['name'] != 'admin')
      header('location: login.php');

function getTitle() {
		echo "Update Page";
	}

include 'partials/admin_header.php';

$id = $_GET['id'];

require 'partials/db_config.php';

$selItem = "SELECT * FROM items WHERE itemID = '$id'";

$itemInfo = mysqli_query($conn, $selItem); 

if($itemInfo) {
	
	while($row = mysqli_fetch_assoc($itemInfo)){
		$name = $row["name"];
		$image = $row["image"];
		$description = $row["description"];
		$price = $row["price"];
		$stocks = $row["stocks"];
		$category = $row["categoryID"];
	}
}

$selCat = "SELECT description FROM category where categoryID = '$category'";

$getCat = mysqli_query($conn, $selCat);

if($getCat) {
	while($catRow = mysqli_fetch_assoc($getCat)){
		$catDesc = $catRow["description"];
	}
}


 ?>



	<header class="container">
		<h2>Update Product Details</h2>
		<hr>
	</header>

	<div class="container">
		<form class="form-horizontal" method="POST" action="assets/lib/updItem_action.php">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<label for="prodName" class="col-sm-2 control-label">New Product Name:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="prodName" name="prodName" value = "<?php echo $name; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label for="img" class="col-sm-2 control-label">New Image File Path:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="img" name="img" value = "<?php echo $image; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label for="prodDesc" class="col-sm-2 control-label">Product Description:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="prodDesc" name="prodDesc" value = "<?php echo $description; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label for="price" class="col-sm-2 control-label">Product Price:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="price" name="price" value = "<?php echo $price; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label for="stocks" class="col-sm-2 control-label">Quantity Available:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="stocks" name="stocks" value = "<?php echo $stocks; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<small>Currently set to <?php echo $catDesc; ?></small>
  				<label for="category" class="col-sm-2 control-label">Choose new category:</label>
				<select class="form-control col-sm-7 col-md-7" id="category" name="category">
    				<option value="1">sci-fi</option>
    				<option value="2">fantasy</option>
    				<option value="3">horror</option>
    				<option value="4">dexterity</option>
    				<option value="5">card</option>
    				<option value="6">dice</option>
    				<option value="7">family</option>
  				</select>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-success">Update Record</button>
				</div>
			</div>
		</form>
	</div>