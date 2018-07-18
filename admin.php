<?php 

session_start();

if($_SESSION['name'] != 'admin')
      header('location: login.php');

function getTitle() {
		echo "Products Management Page";
	}

require './partials/admin_header.php';

if(isset($_GET["add"])) {
	echo "<div class='alert alert-success'>
		<strong>Product Added</strong>
			</div>"; //add item notification
}

if(isset($_GET["del"])) {
	echo "<div class='alert alert-danger'>
		<strong>Product Deleted</strong>
			</div>"; //delete item notification
}

if(isset($_GET["update"])) {
	echo "<div class='alert alert-info'>
		<strong>Product Updated</strong>
			</div>"; //update item notification
}

require './partials/db_config.php';
$sql = "SELECT * FROM items";

$result = mysqli_query($conn, $sql);

?>

<header class="container">
	<h2>Add Product</h2>
	<hr>
</header>

	<div class="container">
		<form class="form-horizontal" method="POST" action="assets/lib/addItem.php">
			<div class="form-group">
				<label for="itemName" class="col-sm-2 control-label">Product Name:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="itemName" name="itemName" required>
				</div>
			</div>

			<div class="form-group">
				<label for="itemDesc" class="col-sm-2 control-label">Product Description:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="itemDesc" name="itemDesc" required>
				</div>
			</div>

			<div class="form-group">
				<label for="img" class="col-sm-2 control-label">Image File Path:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="img" name="img" required>
				</div>
			</div>


			<div class="form-group">
				<label for="price" class="col-sm-2 control-label">Price:</label>
				<div class="col-sm-7 col-md-7">
				  <input type="text" class="form-control" id="price" name="price" required>
				</div>
			</div>

			<div class="form-group">
  				<label for="category" class="col-sm-2 control-label">Choose category:</label>
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
				  <button type="submit" class="btn btn-success">Add Product</button>
				</div>
			</div>
		</form>
	</div>

<?php
	//create product table
	echo "<table class='table table-bordered'>
			<thead>
				<tr>
					<th>Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Stocks</th>
					<th>Actions</th>
				</tr>
			</thead>
		<tbody>
		";

if (mysqli_num_rows($result) > 0) {
				
	$counter = 0;
	while($row = mysqli_fetch_assoc($result)) {
					
		$counter = $counter + 1;
		echo "<tr>";
		echo "<td>" . $row['name']. "</td>";
		echo "<td><img style='width:100px;height:100px;' src='" . $row['image'] . "'></td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "<td>" . $row['stocks'] . "</td>";
		echo "<td>
			<a href='assets/lib/delItem.php?id=$row[itemID]' class='btn btn-danger' role='button'>Delete</a>
			<a href='updItem.php?id=$row[itemID]' class='btn btn-success' role='button'>Update</a>
			<a href='adminView.php?id=$row[itemID]' class='btn btn-info' role='button'>View Product</a>
			</td>";
		echo "</tr>";
		}
	} else {
			echo "No Records Found";
			}

			echo "</tbody></table>";

?>
