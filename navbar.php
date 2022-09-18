<?php 
include('db_conn/db_conn.php');
session_start();


?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark position-relative top-0">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Cashier POS System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <?php 
                $email = $_SESSION['user'];
                $sql = "SELECT USERNAME,TYPE FROM user WHERE USERNAME=:email";
                $query = $conn->prepare($sql);
                $query->bindParam(':email', $email , PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0) 
                {
                  foreach($results as $result)
                {
              ?>
              <?php if($result->TYPE == 'Administrator') {?>
              <li class="nav-item">
                <a class="nav-link" href="home.php" accesskey="h">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product-list.php" accesskey="j">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user-list.php" accesskey="k">Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transaction-list.php" accesskey="l">Transaction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pos-system.php" accesskey="p">POS</a>
              </li>
              <?php } ?>
              <?php if($result->TYPE == 'Cashier'){ ?>
              <li class="nav-item">
                <a class="nav-link" href="home.php" accesskey="h">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pos-system.php" accesskey="p">POS</a>
              </li>
              <?php } ?>
              <?php }} ?>
            </ul>


              <!-- logout btn -->
                <?php 
                // get value of global variable SESSION[user]
                $email = $_SESSION['user'];
                // perform a query to database
                $sql = "SELECT * FROM user WHERE USERNAME=:email";
                // prepare statement for execution and return object
                $query = $conn->prepare($sql);
                // bind parameter to specified variable name
                // bindParam(param,var,type,maxLength)
                $query->bindParam(':email', $email , PDO::PARAM_STR);
                // execute prepare statement
                $query->execute();
                // fetch all remaining rows in result set and assing to var results
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0) 
                {
                  foreach($results as $result)
                {
                ?>
                <div class="dropdown dropstart ms-auto">
                    <button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown">
                    Hi <?php echo htmlentities($result->NAME); ?>
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="update-password.php">Manage account</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
          </div>
        </div>
    </nav>
    <div class="bg-dark text-white p-3">
		<div class="d-flex flex-row justify-content-center">
      <?php if($result->TYPE == 'Administrator') {?>
			<fieldset class="border border-light p-2 text-light ">
                    <legend class="text-light w-auto float-none fs-5">Keyboard Shortcuts</legend>
                    <label for="">ALT + H = Go to Home Page.</label>
                    <label for="" class="mx-2">ALT + J = Go to Products.</label>
                    <label for="" class="mx-2">ALT + K = Go to User Page</label>
                    <label for="" class="mx-2">ALT + L = Go to Transaction Page</label>   
                    <label for="" class="mx-2">ALT + P = Go to Payment Page</label>      
      </fieldset>   
      <?php } ?>
      <?php if($result->TYPE == 'Cashier') {?>
			<fieldset class="border border-light p-2 text-light ">
                    <legend class="text-light w-auto float-none fs-5">Keyboard Shortcuts</legend>
                    <label for="">ALT + H = Go to Home Page.</label> 
                    <label for="" class="mx-2">ALT + P = Go to Payment Page</label>      
      </fieldset>   
      <?php } ?>

		</div>
	</div>
  <?php }} ?>
