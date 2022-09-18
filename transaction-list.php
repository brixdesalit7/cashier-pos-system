<?php 
    include_once('db_conn/db_conn.php');
    session_start();
    date_default_timezone_set("Asia/Manila"); 

    if(isset($_GET['del'])) {
      $id = $_GET['del'];
      $month = intval($_GET['month']);

      $sql = "DELETE FROM transaction_list WHERE ID=:id";
      $query = $conn->prepare($sql);
      $query->bindParam(':id',$id,PDO::PARAM_STR);
      $query->execute();
      if($query) {
        $success = 'Delete product success';
      }else {
        $error = 'Something went wrong';
          
      }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction | Cashier POS System</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <!--  FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;1,100;1,300&display=swap" rel="stylesheet">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DATA TABLE JQUERY -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    <script>
      // BARCODE SCANNER
      // var barcode = '';
      // var interval;
      // document.addEventListener('keydown', function(evt){
      //   if(interval) 
      //     clearInterval(interval);
      //     if(evt.code == "Enter"){
      //       handleBarcode(barcode);
      //       barcode = '';
      //       return;
      //     }
      //     if(evt.key != 'Shift')
      //       barcode += evt.key;
      //     interval = setInterval(() => barcode = '',20);
      // });

      // function handleBarcode(scanned_barcode) {
      //   document.querySelector('#code').innerHTML = scanned_barcode;
      // }
      $(document).ready(function(){
        $("#searchItem").on("keyup",function(){
          var value = $(this).val().toLowerCase();
          $("#tableItem tr").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>

</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container content">
        <div id="showMsg">
          <?php if($success){ ?>
                <div class="alert alert-success mt-1"><?php echo htmlentities($success);?></div>
            <?php  } else if($error){ ?>
              <div class="alert alert-danger mt-1"><?php echo htmlentities($error) ?></div>  
            <?php } ?>
          </div>
          <div id="editMsg">
            <?php if(isset($_GET['edit']) && intval($_GET['edit']) == 1 ){ ?>
                <div class="alert alert-success mt-1">Edit Success</div>
            <?php  } else if(isset($_GET['edit']) && intval($_GET['edit']) == 0 ){ ?>
              <div class="alert alert-danger mt-1">Something went wrong</div>  
            <?php } ?>
          </div>
        <div class="d-flex justify-content between border p-3 bg-light rounded ">
            <div class="title text-dark">
                <h3>Transaction List</h3>
            </div>
            <div class="add-product-btn ms-auto">
                <button class="btn btn-dark btn-sm"  data-bs-toggle="modal" data-bs-target="#addProducts">Add Product</button>
            </div>
        </div>
        <div class="product-list border rounded-bottom p-3">
            <!-- TABLE -->
            <div class="table-responsive">
            <table class="table table-bordered mt-3" id="dataTable">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Total Amount</th>
                    <th>Tendered Amount</th>
                    <th>Discount</th>
                    <th>Total Change</th>
                    <th>Date/Time of Transaction</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="tableItem">
                  <?php
                    $sql = "SELECT * FROM transaction_list ORDER BY ID DESC";
                    $query = $conn->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                    {
                  ?>
                  <tr>
                    <td><?php echo htmlentities($result->USERNAME);?></td>
                    <td><?php echo htmlentities($result->TOTAL_AMOUNT);?></td>
                    <td><?php echo htmlentities($result->TENDERED_AMOUNT);?></td>
                    <td><?php echo htmlentities($result->DISCOUNT);?>%</td>
                    <td><?php echo htmlentities($result->TOTAL_CHANGE);?></td>
                    <td><?php echo htmlentities($result->CREATED);?></td>
                    <td>   
                    <div class="dropdown ms-auto">
                    <button type="button" class="btn btn-dark dropdown-toggle btn-sm mx-auto d-block" data-bs-toggle="dropdown">
                    Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delProducts<?php echo htmlentities($result->ID);?>">Delete</a></li>
                    </ul>
                    <?php include('manage-transaction.php'); ?>
                    </div> 
                  </td>
                  </tr>
                  <?php }} ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>

    <!-- Add Products -->
    <div class="modal fade" id="addProducts">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Add New Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form  method="POST" name="add-product">
              <div class="mb-1">
                <label>Barcode</label>
                <input type="number" class="form-control" name="code" value="" required>
              </div>
              <div class="mt-2">
                <label>Unit</label>
                <select class="form-select" name="unit" required>
                  <option>Box</option>
                  <option>Pcs</option>
                </select>
              </div>
              <div class="mt-2">
                <label>Name</label>
                <input type="text" class="form-control" name="name"  required>
              </div>
              <div class="mt-2">
                <label>Alias</label>
                <input type="text" class="form-control" name="description" placeholder="Optional"></input>
              </div>
              <div class="mt-2">
                <label>Price</label>
                <input type="number" class="form-control" name="price"  required>
              </div>
              <div class="mt-2">
                <label>Sale Price</label>
                <input type="number" class="form-control" name="sale_price" required>
              </div> 
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
          <button class="btn btn-success" type="submit" name="save">Save</button>
            <!-- <button class="btn btn-success btn-sm" id="btn" name="submit" value="Save"><div class="spinner-border text-light"></div>Save</button> -->
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </form>

        </div>
      </div>
    </div>
    
<script>
  setTimeout(function() {
    $('#showMsg').fadeOut('slow');
  }, 3000) ;
  setTimeout(function() {
    $('#editMsg').fadeOut('slow');
  }, 3000) ;
  $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>

</body>
</html>