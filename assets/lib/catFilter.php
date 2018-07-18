<?php
$catID = $_POST["id"];

//connect to db
require '../../partials/db_config.php';

//SQL statement
$sql = "SELECT * FROM items WHERE categoryID = '$catID';";

$result = mysqli_query($conn, $sql); //run the above sql command

if(mysqli_num_rows($result) > 0){
    $counter = 0;
    while($row = mysqli_fetch_assoc($result)){
        $counter = $counter+1;
        $id =$row["itemID"];
            echo "
                <div class='col-sm-6 col-md-4'>
                    <div class='thumbnail'>
                        <img src='$row[image]' alt='$row[name]'>
                            <div class='caption'>
                                <h3><a href='item.php?id=$row[itemID]'>$row[name]</a></h3>
                                <p>$ $row[price]</p>
                                    <div class='form-group'>
                                      <input class='form-control' id='quantity$id' type='number' min='0' value='0'>
                                    </div>
                                    <div class='form-group'>
                                      <button class='btn btn-primary btn-block btn-lg' role = 'button'  onclick='addToCart($id)'' ><span class='glyphicon glyphicon-shopping-cart'></span>Add to Cart</button>
                                    </div>
                              </div>
                            </div>
                          </div>";
                      }
                    } 

?>