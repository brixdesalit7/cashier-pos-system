<?php 
    require_once('db_conn.php');

    $code = $_POST['code'];
    $unit = $_POST['unit'];
    $name = $_POST['name'];
    $descript = $_POST['descript'];
    $price = $_POST['price'];

    if(empty($code) || empty($unit) || empty($name) || empty($descript) || empty($price)) {
        echo '<div class="alert alert-danger">Form is empty</div>';
    }else {
        $sql = "INSERT INTO products(CODE,UNIT,NAME,DESCRIPTION,PRICE) VALUES(:code,:unit,:name,:descript,:price)";
        $query = $conn->prepare($sql);
        $query->bindParam(':code',$code,PDO::PARAM_STR);
        $query->bindParam(':unit',$unit,PDO::PARAM_STR);
        $query->bindParam(':name',$name,PDO::PARAM_STR);
        $query->bindParam(':descript',$descript,PDO::PARAM_STR);
        $query->bindParam(':price',$price,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $conn->lastInsertId();
        if($lastInsertId) {
            location('Location: product-list.php?success=1');
        }else {
            echo '<div class="alert alert-danger">Something went wrong</div>';
        }


        


    }
?>