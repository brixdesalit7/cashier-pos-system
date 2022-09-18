<?php 
include_once('db_conn/db_conn.php');
session_start();
$id = intval($_GET['id']);
$name = $_POST['name'];
$username = $_POST['username'];
$type = $_POST['type'];


$sql = "UPDATE user SET NAME=:name,USERNAME=:username,TYPE=:type WHERE ID=:id ";
$query = $conn->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
if($query){
header('Location: user-list.php?edit=1');
}else{
header('Location: user-list.php?edit=0');
}
     
          

