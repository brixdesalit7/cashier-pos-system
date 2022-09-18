<?php
    include_once('db_conn/db_conn.php');
    session_start();

    if(isset($_POST['login'])) {
        // get the value of email and password input form
        $email = $_POST['usernamelogin'];
        $password = $_POST['passwordlogin'];
        // perform a query to database
        $sql = "SELECT * FROM user WHERE USERNAME = :usernamelogin AND PASSWORD = :passwordlogin";
        // prepare statement for execution and return object
        $query = $conn->prepare($sql);
        // bind parameter to specified variable name
        // bindParam(param,var,type,maxLength)
        $query->bindParam(':usernamelogin', $email , PDO::PARAM_STR);
        $query->bindParam(':passwordlogin', $password , PDO::PARAM_STR);
        // execute prepare statement
        $query->execute();
        // fetch all remaining rows in result set and assing to var results
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0) {
            // assign the value of global variable $_SESSION
            // $_SESSION[user] = value of username input form
            $_SESSION['user'] = $_POST['usernamelogin'];
            // $_SESSION[name] = value of $result->(object operator) NAME
            $_SESSION['name'] = $results->NAME;
            // $_SESSION[type] = value of $result->(object operator) TYPE
            $_SESSION['type'] = $results->TYPE;
            // $_SESSION[id] = value of $result->(object operator) ID
            $_SESSION['id'] = $results->ID;
            // direct to another page 
            header("location: home.php");
        } else {
            // pass a paramater msg = 0
            header('Location: index.php?msg=0');
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier POS System</title>
    <link rel="stylesheet" href="css/style.css">
    <!--  FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;1,100;1,300&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

    <!-- Login Form -->
    <div class="form-wrapper">
        <div class="form-title">
            <h1>Cashier POS System</h1>
        </div>
        <div id="insertMsg">
            <?php if(isset($_GET['msg']) && intval($_GET['msg']) == 0 ){ ?>
            <div class="alert alert-danger mt-1">Invalid username or password</div>  
            <?php } ?>
        </div>
            <div class="form-input">
                <form method="POST">
                    <div class="input-login">
                        <div class="label">
                            <label>Username</label>
                        </div>
                        <div class="user-input">
                            <input type="text" autofocus name="usernamelogin">
                        </div>
                    </div>
                    <div class="input-login">
                        <div class="label">
                            <label>Password</label>
                        </div>
                        <div class="user-input">
                            <input type="password" name="passwordlogin">
                        </div>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>
            </div>
    </div>

<script>
// hide message after 4000
setTimeout(function() {
$('#insertMsg').fadeOut('slow');
}, 4000) ;
</script>

</body>
</html>