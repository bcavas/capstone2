<?php
session_start();

include "../../partials/db_config.php";

$data = "<table class='table table-striped table-responsive'>
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub-Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>";

$grand_total = 0;
foreach($_SESSION['cart'] as $product_id => $quantity) {
    $sql = "SELECT * FROM items where itemID = '$product_id' ";
              $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      $product_name = $row["name"];
                      $product_desc = $row["description"];
                      $price = $row["price"];
                                
                        //For computing the sub total and grand total
                        $subTotal = $quantity * $price;
                        $grand_total += $subTotal;

                        $data .=
                          "<tr>
                              <td>$product_name</td>
                              <td id='price$product_id'> $price</td>
                              <td><input type='number' class ='form-control' value = '$quantity' id='quantity$product_id' onchange='changeNoItems($product_id)' onblur='stockCheck($product_id)'min='1' size='5'></td>
                              <td id='subTotal$product_id'>$subTotal</td>
                              <td><button class='btn btn-danger' onclick='removeFromCart($product_id)'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Remove</button></td>
                          </tr>";
                    }
                }
}

$data .="</tbody></table>
              <hr>
              <h5 id='oosMsg'></h5>
              <h3 align='right'>Total: $ <span id='grandTotal'>$grand_total </span><br><a href='checkout.php'><button id='stockCheck' class='btn btn-info btn-lg'><span class='glyphicon glyphicon-ok-sign'></span> Check Out</button></a></h3>
              ";

echo $data;
