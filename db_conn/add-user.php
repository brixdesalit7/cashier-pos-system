<?php 
    require_once('db_conn.php');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $type = $_POST['type'];
  

    if(empty($name) || empty($username) || empty($type)) {
        echo '<div class="alert alert-danger">Form is empty</div>';
    }else {
        $sql = "INSERT INTO user(NAME,USERNAME,PASSWORD,TYPE) VALUES(:name,:username,:username,:type)";
        $query = $conn->prepare($sql);
        $query->bindParam(':name',$name,PDO::PARAM_STR);
        $query->bindParam(':username',$username,PDO::PARAM_STR);
        $query->bindParam(':type',$type,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $conn->lastInsertId();
        if($lastInsertId) {
            echo '<div class="alert alert-success">New user added</div>';
        }else {
            echo '<div class="alert alert-danger">Something went wrong</div>';
        }


        


    }
?>