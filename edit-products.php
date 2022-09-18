<?php 
include_once('db_conn/db_conn.php');
session_start();
$id = intval($_GET['id']);
$code = $_POST['code'];
$unit = $_POST['unit'];
$name = $_POST['name'];
$descript = $_POST['descript'];
$price = $_POST['price'];
$sale_price = $_POST['sale_price'];

$sql = "UPDATE product SET bar_code=:code,unit=:unit,name=:name,alias=:descript,mrp=:price,sale_price=:sale_price WHERE id=:id ";
$query = $conn->prepare($sql);
$query->bindParam(':code',$code,PDO::PARAM_STR);
$query->bindParam(':unit',$unit,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':descript',$descript,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':sale_price',$sale_price,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
if($query){
header('Location: product-list.php?edit=1');
}else{
header('Location: product-list.php?edit=0');
}
     
          

