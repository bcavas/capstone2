
<?php 
session_start();


if(!isset($_SESSION['name'])) {
    header('location: login.php');
} 

if($_SESSION['name'] == 'admin') {
    header('location: admin.php');
  } 

function getTitle() {
    echo "Cart";
}

require './partials/header.php';

?>

<div class="container" style="margin-top:60px">
<h2>My Shopping Cart</h2><hr>

    <div id="loadCart">

    </div>

</div>

<script type="text/javascript">

// READ records using AJAX shorthand get request
function loadCart() {
    $.get("assets/lib/load_cart.php", function (data, status) {
        $("#loadCart").html(data);
    });
}


$(document).ready(function () {
    // READ records on page load
    loadCart(); // calling function
});

function changeNoItems(id){
  var items = $("#quantity" + id).val();
  var price = $("#price" + id).text();
  var newPrice = (items * price);
  $("#subTotal" + id).text(newPrice);
  addToCart(id);
  loadCart();
}

function addToCart(itemId){
      var quantity = $("#quantity"+itemId).val();
      console.log("This is item ID:" + itemId);
      console.log("This is the quantity:" + quantity);

          $.ajax({
              url:"assets/lib/add_to_cart.php", 
              method:"POST",
              data:
                    {
                      item_id: itemId,
                      item_quantity: quantity
                    },
                dataType:"text",
                  success:function(data, status){
                  $('a[href="cart.php"]').html(data);
            }
          })
    }

function removeFromCart(id){
  var ans = confirm("Are you sure?");
  if(ans){ //if asnwer to the confirmation popup is yes
    $.ajax({
      url:"assets/lib/remove_from_cart.php", //pass variable here and perform whatever function is in that page
      method:"POST",
      data:{
        x: id //take the parameter "id" passed to this function and POST it as "x"
      },
      dataType:"text", //what data type is expected to be received from target url
      success:function(data){
        $('a[href="cart.php"]').html(data); //if successful, select specified element and replace the value w/ the one received from target URL
        loadCart();
      }
    });
  } 
}

function stockCheck(itemId){
      var itemId = itemId
      var quantity = $("#quantity"+itemId).val();
      console.log("item id: " + itemId + " quantity: " + quantity);

          $.ajax({
            url:"assets/lib/stockCheckout.php",
            method:"POST",
            data: 
                  {
                    itemId: itemId,
                    quantity: quantity
                  },
            dataType:"text",
            success:function(data){
            $("#oosMsg").html(data);
            }
          })
}

</script>

<?php include 'partials/footer.php' ?>;