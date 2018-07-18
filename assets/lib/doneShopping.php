<?php

 //clear cart after displaying confirmation page
    

session_start();

// $id = $_POST["x"];

unset($_SESSION["cart"]);

$_SESSION["item_count"] = 0;

echo "
<span class='glyphicon glyphicon-shopping-cart'></span>Shop
<span class='badge'>". $_SESSION['item_count']."</span>";