<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cashier_system";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=cashier_system", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

?>