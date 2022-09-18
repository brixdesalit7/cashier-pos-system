<?php 
    include_once('db_conn/db_conn.php');
    session_start();
    
    if(isset($_POST['update'])) {

        $username = $_POST['username'];
        $newpass = $_POST['newpass'];
        
        $sql = "UPDATE user SET PASSWORD=:newpass WHERE USERNAME=:username";
        $query = $conn->prepare($sql);
        $query->bindParam(':username',$username,PDO::PARAM_STR);
        $query->bindParam(':newpass',$newpass,PDO::PARAM_STR);
        $query->execute();
        
        $success = "Credential Updated";
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List | Cashier POS System</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <!--  FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;1,100;1,300&display=swap" rel="stylesheet">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        <div class="d-flex border p-3 bg-light rounded">
            <div class="title text-dark">
                <h3>Update Password</h3>
            </div>
        </div>
        <div class="product-list border rounded-bottom p-3">
            <!-- TABLE -->
            <div class="table-responsive">
                <?php
                    $user = $_SESSION['user'];
                    $sql = "SELECT * FROM user WHERE USERNAME=:user";
                    $query = $conn->prepare($sql);
                    $query->bindParam(':user',$user,PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0) 
                    {
                        foreach($results as $result)
                    {
                ?>
                <?php }} ?>
                <form method="POST">
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Name</label>
                        <input type="text" class="form-control w-50" readonly value="<?php echo htmlentities($result->NAME); ?>"  name="name">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Username</label>
                        <input type="text" class="form-control w-50" readonly  value="<?php echo htmlentities($result->USERNAME); ?>" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">New Password</label>
                        <input type="password" class="form-control w-50"  name="newpass">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
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
</script>
</body>
</html>