<?php
    require_once('db_conn.php');

    extract($_POST);
    $qty = 1;
    if(strpos($t,'*') !== false){
        $ex = explode("*", $t);
        $term = (isset($ex[1])) ? $ex[1] : "";
        $qty = $ex[0];
    }else {
        $term = $t;
    }
    $qry = $this->query("SELECT * FROM `products` WHERE `CODE` LIKE '%{$term}%'");
    if($term !=""){
            
        while($row = $qry->fetchArray()){
            $row['qty'] = $qty;
            $data[] = array("label"=>$row['product_code']." - ".$row['name'],
                            "value"=>$row['product_code'],
                            "id"=>$row['product_id'],
                            "data"=>$row
                            );
        }
        if(!$qry->fetchArray()){
            $data[] = array("label"=>"Product Code is Unknown.",
                            "value"=>"",
                            "id"=>""
                            );
        }
    }
    
    return json_encode($data);

?>