<!DOCTYPE html>
<html lang="en">
<head>
    <title>The Cardboard Connoisseur</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./assets/js/jquery-3.3.1.js"></script>
    <script src="./assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"> The Cardboard Connoisseur | <?php getTitle(); ?></a>
    </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">

      <li><a href="admin.php">Items</a></li>
      <li><a href="adminOrders.php">Orders</a></li>
        
      <?php

      if(isset($_SESSION['name'])) {
          echo '
              <li><a href="logout.php">Log Out</a><span class="hover"></span></li>
          ';
      }
      else {
         echo '
            <li><a href="login.php">Log In</a><span class="hover"></span></li>
            <li><a href="register.php">Register</a><span class="hover"></span></li>
        ';
      }

      ?>
    </ul>
  </div>
  </div>
</nav>