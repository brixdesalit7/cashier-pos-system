<?php
include('db_conn/db_conn.php');
// session start
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Cashier POS System</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <!--  FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;1,100;1,300&display=swap" rel="stylesheet">
</head>
<body>
  <!-- include navbar -->
  <?php include 'navbar.php'; ?>

  <div class="report mt-5 p-2">
    <div class="container">
      <div class="d-sm-flex flex-wrap justify-content-around">
        <!-- CARD -->
        <div class="card text-dark border-3 rounded border-dark p-3 mt-5" style="width: 350px;">
        <div class="card-body mx-auto d-block text-center">
        <img src="img/product-logo.png"/>
        <h5 class="mt-3">Number of Products</h5>
        <?php
        // include config.php
        // this file is connected to database
        include_once('config.php');
        // perform query to database
        $official = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM product");
        // fetch result as an associative array
        $official_result = mysqli_fetch_array($official);
        ?>
        <h4><?php echo $official_result['COUNT']; ?></<h4>
        </div>
        </div>
        <!-- CARD -->
        <div class="card text-dark border-3 rounded border-dark p-3 mt-5" style="width: 350px;">
        <div class="card-body mx-auto d-block text-center">
        <img src="img/user-logo.png"/>
        <h5 class="mt-3">Number of User</h5>
        <?php

        $official = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM user");
        $official_result = mysqli_fetch_array($official);
        ?>
        <h4><?php echo $official_result['COUNT']; ?></<h4>
        </div>
        </div>
        <!-- CARD -->
        <div class="card text-dark border-3 rounded border-dark p-3 mt-5" style="width: 350px;">
        <div class="card-body mx-auto d-block text-center">
        <img src="img/sale-logo.png"/>
        <h5 class="mt-3">Number of Transaction</h5>
        <?php

        $official = mysqli_query($conn,"SELECT COUNT(id) AS COUNT FROM transaction_list");
        $official_result = mysqli_fetch_array($official);
        ?>
        <h4><?php echo $official_result['COUNT']; ?></<h4>
        </div>
        </div>

      </div>
    

    </div>
  </div>

</body>
</html>