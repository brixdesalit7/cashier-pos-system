<?php 
    include_once('db_conn/db_conn.php');
    session_start();
    // ADD PRODUCTS
    // check if the form submitted using isset()
    // use the name value of button to check
    if(isset($_POST['save'])) {
      // $_POST is one of the method to use to send form
      // POST variable contain associative array
      // example the  name value of barcode input is code where value is code  
      // to retrieve it use the $_POST["code"]
      // assign each array to variable
      $code = $_POST['code'];
      $unit = $_POST['unit'];
      $name = $_POST['name'];
      $descript = $_POST['description'];
      $price = $_POST['price'];
      $sale_price = $_POST['sale_price'];

      // perform a query to database
      // select from product where bar_code = code
      // the code will be use to check if barcode already exist in database 
      $sql = "SELECT * FROM product WHERE bar_code = :code";
      // use the prepare function to prepare $sql for execution
      // assign it to variable $query
      $query = $conn->prepare($sql);
      // Binds a parameter to the specified variable name
      // bindParam(param, var, type)
      // param : For a prepared statement using named placeholders, this will be a parameter name of the form :code
      // var : Name of the PHP variable to bind to the SQL statement parameter
      // type : Explicit data type for the parameter using the PDO::PARAM_* constants
      $query->bindParam(':code',$code,PDO::PARAM_STR);
      //  the application binds the values to the parameters, and the database executes the statement.
      $query->execute();
      // fetch all rows from a result set associated with a PDOStatement object into an array.
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      // :rowCount() returns the number of rows affected by the last DELETE, INSERT, or UPDATE statement executed by the corresponding PDOStatement object.
      // -> object operator is used in object scope to access methods and properties of an object.
      // check the number of row affected by last query
      // if query->rowCount() is greater than 0
      // if it's true locate the file and pass a paramater 2
      // this will show the message product already listed
      if($query->rowCount() > 0 ){
        header('Location: product-list.php?insert=2');
      // if the condition in if is false perform a query to database  
      } else {
          $sql = "INSERT INTO product(bar_code,unit,name,alias,mrp,sale_price) VALUES(:code,:unit,:name,:description,:price,:sale_price)";
          $query = $conn->prepare($sql);
          $query->bindParam(':code', $code, PDO::PARAM_STR);
          $query->bindParam(':unit', $unit, PDO::PARAM_STR);
          $query->bindParam(':name', $name, PDO::PARAM_STR);
          $query->bindParam(':description', $descript, PDO::PARAM_STR);
          $query->bindParam(':price', $price, PDO::PARAM_STR);
          $query->bindParam(':sale_price', $sale_price, PDO::PARAM_STR);
          $query->execute();
          $lastInsertId = $conn->lastInsertId();
          // PDO::lastInsertId — Returns the ID of the last inserted row or sequence value
          if($lastInsertId) {
            header('Location: product-list.php?insert=1');
          }else {
            header('Location: product-list.php?insert=0');
          }
        } 
    }

    // Delete products
    if(isset($_GET['del'])) {
      // assign the value of global variable $_GET['del'] to variable id
      $id = $_GET['del'];
      // query to database
      // DELETE FROM table produce where id is equal to value of $_GET['del]
      $sql = "DELETE FROM product WHERE id=:id";
      $query = $conn->prepare($sql);
      $query->bindParam(':id',$id,PDO::PARAM_STR);
      $query->execute();
      // if query is true display a message
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
    <title>Products | Cashier POS System</title>
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
    <style>
      input {
        text-transform: uppercase;
      }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container content">
        <div id="showMsg">
          <!-- if variable success is true display a value -->
          <?php if($success){ ?>
                <!-- htmlentities convert characters to html entities  -->
                <div class="alert alert-success mt-1"><?php echo htmlentities($success);?></div>
            <?php  } else if($error){ ?>
              <div class="alert alert-danger mt-1"><?php echo htmlentities($error) ?></div>  
            <?php } ?>
          </div>
          <div id="insertMsg">
            <!-- if $_GET insert is have a value and $_GET insert == 1 -->
            <!-- display a message new product added -->
            <!-- intval convert  return the interger value of variable $_GET insert -->
            <?php if(isset($_GET['insert']) && intval($_GET['insert']) == 1 ){ ?>
                <div class="alert alert-success mt-1">New product added</div>
            <?php  } else if(isset($_GET['insert']) && intval($_GET['insert']) == 0 ){ ?>
              <div class="alert alert-danger mt-1">Something went wrong</div>  
            <?php }  else if(isset($_GET['insert']) && intval($_GET['insert']) == 2 ){  ?>
              <div class="alert alert-danger mt-1">Product already listed</div>  
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
                <h3>Product List</h3>
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
                    <th>BarCode</th>
                    <th>Unit</th>
                    <th>Name</th>
                    <th>Alias</th>
                    <th>Price</th>
                    <th>SalePrice</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="tableItem">
                  <?php
                  // perform a query to database
                  // select all from table product
                    $sql = "SELECT * FROM product";
                  // use the prepare function to prepare $sql for execution
                    $query = $conn->prepare($sql);
                  // execute a query
                    $query->execute();
                    // fetch all rows from a result set associated with a PDOStatement object into an array.
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    { 
                      // loops through array
                      foreach($results as $result)
                    {
                  ?>
                  <tr>
                    <!-- display the value of each row from database -->
                    <!-- use object operator to access each row -> -->
                    <!-- because the value of $result variable is object from the database -->
                    <td><?php echo htmlentities($result->bar_code);?></td>
                    <td><?php echo htmlentities($result->unit);?></td>
                    <td><?php echo htmlentities($result->name);?></td>
                    <td><?php echo htmlentities($result->alias);?></td>
                    <td><?php echo htmlentities($result->mrp);?></td>
                    <td><?php echo htmlentities($result->sale_price);?></td>
                    <td>   
                    <div class="dropdown ms-auto">
                    <button type="button" class="btn btn-dark dropdown-toggle btn-sm mx-auto d-block" data-bs-toggle="dropdown">
                    Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editProducts<?php echo htmlentities($result->id);?>">Edit</a></li>
                      <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delProducts<?php echo htmlentities($result->id);?>">Delete</a></li>
                    </ul>
                    </div>
                    <?php include('manage-products.php'); ?>
                  </td>
                  </tr>
                  <?php }}?>
                </tbody>
              </table>
            </div>
        </div>
    </div>

    <!--Modal Add Products -->
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
                <input type="number" class="form-control" name="code" autofocus required>
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
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </form>

        </div>
      </div>
    </div>
    
<script>
  // setTimeout hide msg
  setTimeout(function() {
    $('#insertMsg').fadeOut('slow');
  }, 3000) ;
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