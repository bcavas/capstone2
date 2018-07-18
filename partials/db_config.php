<?php

$conn = mysqli_connect("localhost", "root", "", "cap2");

if (!$conn) {
	die("Failed Connection" . mysqli_connect_error());
}