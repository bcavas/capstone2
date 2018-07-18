<?php
$name = $_POST["username"];
$pass = sha1($_POST["pwd"]); //hash this so that it will match the encrypted value saved in the database

//connect to db
require '../../partials/db_config.php';

//SQL statement
$sql = "SELECT * FROM users WHERE username = '$name' AND password = '$pass' AND status = 'active';";

$result = mysqli_query($conn, $sql); //run the above sql command

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
		session_start();
		$_SESSION["id"] = $row["userID"]; //create session variables for various user info
		$_SESSION["name"] = $row["username"];
		$_SESSION["email"] = $row["email"];
		$_SESSION["fname"] = $row["firstName"];
		$_SESSION["lname"] = $row["lastName"];
		$_SESSION["password"] = $row["password"];
		$_SESSION["address"] = []; //create arrays for users who will have multiple addresses
		$_SESSION["phone"] = [];
		$_SESSION["zipCode"] = [];
		$_SESSION["city"] = [];

		$selAd = "SELECT * FROM address WHERE userID = '$_SESSION[id]';";
		$adQuery = mysqli_query($conn, $selAd);

				if(mysqli_num_rows($adQuery) > 0){//if there's a match, perform a while loop
					while($row = mysqli_fetch_assoc($adQuery)){//keep on looping as long as there's a row w/ a matching user ID
						$zipID = $row["zipID"];
						array_push($_SESSION["address"], $row["address"]); //add all addresses of current user to the session array "address"
						array_push($_SESSION["phone"], $row["phone"]);

						$selZip = "SELECT zipCode FROM zip WHERE zipID = $zipID;";//SQL query for obtaining zip code
						$fetchZip = mysqli_fetch_assoc(mysqli_query($conn, $selZip));//fetch associative array after performing SQL query
						array_push($_SESSION["zipCode"], $fetchZip["zipCode"]); 

						$selCity = "SELECT city FROM city WHERE cityID = (SELECT cityID FROM zip WHERE zipID = '$zipID');";
						$fetchCity = mysqli_fetch_assoc(mysqli_query($conn, $selCity));
						array_push($_SESSION["city"], $fetchCity["city"]);
					}
				};

		// array_push($_SESSION["address"],$address)
		//count($_SESSION["address"])
		header('location: ../../index.php');

	}
} else {
	echo "Login failed";
	echo "<a href='../../login.php'>Login Again</a>";
}

?>