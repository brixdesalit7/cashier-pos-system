<?php 
  include_once('db_conn/db_conn.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales List | Cashier POS System</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <!--  FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;1,100;1,300&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php include 'navbar.php'; ?>

    <div class="container content">
        <div class="d-flex border p-3 bg-light rounded">
            <div class="title text-dark">
                <h3>Sales List</h3>
            </div>
  
        </div>
        <div class="product-list border  rounded-bottom p-3">
            <div class="d-sm-flex justify-content-between">
                <div class="show-entry">
                    <label for="sel1" class="form-label">Show Entries</label>
                    <select class="form-select" id="sel1" name="sellist1">
                      <option>10</option>
                      <option>25</option>
                      <option>50</option>
                      <option>100</option>
                    </select>
                </div>
                <div class="search align-self-center mt-3">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
            <!-- TABLE -->
            <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead>
                  <tr>
                    <th>OR Number</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john</td>
                  </tr>
                </tbody>
              </table>
            </div>
       
        </div>
       
    </div>

    
   

</body>
</html>