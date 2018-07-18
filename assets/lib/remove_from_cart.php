<?php
session_start();

$id = $_POST["x"];

unset($_SESSION["cart"][$id]);

$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "
<span class='glyphicon glyphicon-shopping-cart'></span>Shop
<span class='badge'>". $_SESSION['item_count']."</span>";

