<?php
// include the file that is connected to database
include('config.php');
session_start();

	// check if not empty the global variable $_POST[action_type]
	if(!empty($_POST['action_type'])) {
		// remove special characters in string
		$action_type = $conn->real_escape_string($_POST['action_type']);
	
		// select a block of code to execute based on the value of $action_type
		switch($action_type) {
			// block of code to execute if the case is get_detail
			case "get_detail":
			// check if not empty the global variable $_POST[action_type]
			if(!empty($_POST['bar_code'])) {
				// remove special characters in string
				// to make data safe before sending a query to MySQL.
				$bar_code = $conn->real_escape_string($_POST['bar_code']);
				// perform a query to database
				$sql = $conn->query("SELECT * FROM product WHERE bar_code = '$bar_code'");
				// Get the number of rows in the result set
				$numRow = $sql->num_rows;
				// check if the number of rows in result set is greater than 0
				if($numRow > 0) {
					// fetch a result row as an associative array
					$row = $sql->fetch_array();
					// assign the value of each row in associative array
					$detail = array('type'=>'Success','bar_code'=>$row['bar_code'],'alias'=>$row['alias'],'mrp'=>$row['mrp'],'sale_price'=>$row['sale_price'],'av_quantity'=>$row['unit']);
					// encode associative array into JSON object
					echo json_encode($detail);
				} else {
					$detail = array('type'=>'Error');
					echo json_encode($detail);
				}
			}
			// prevent the next code from running if the case is found
			break;
			// block of code to execute if the case is get_detail_by_name
			case "get_detail_by_name":
			if(!empty($_POST['name'])) {
				$name = $conn->real_escape_string($_POST['name']);
				$sql = $conn->query("SELECT * FROM product WHERE name = '$name'");
				$numRow = $sql->num_rows;
				if($numRow > 0) {
					$row = $sql->fetch_array();
					$detail = array('type'=>'Success','bar_code'=>$row['bar_code'],'alias'=>$row['alias'],'mrp'=>$row['mrp'],'sale_price'=>$row['sale_price'],'av_quantity'=>$row['unit']);
					echo json_encode($detail);	
				} else {
					$detail = array('type'=>'Error');
					echo json_encode($detail);
				}
				
			}
			break;
			// block of code to execute if the case is get_detail_by_alias
			case "get_detail_by_alias":
			if(!empty($_POST['alias'])) {
				$alias = $conn->real_escape_string($_POST['alias']);
				$sql = $conn->query("SELECT * FROM product WHERE alias = '$alias'");
				$numRow = $sql->num_rows;
				if($numRow > 0) {
					$row = $sql->fetch_array();
					$detail = array('type'=>'Success','bar_code'=>$row['bar_code'],'alias'=>$row['alias'],'mrp'=>$row['mrp'],'sale_price'=>$row['sale_price'],'av_quantity'=>$row['unit']);
					echo json_encode($detail);	
				} else {
					$detail = array('type'=>'Error');
					echo json_encode($detail);
				}
				
			}
			break;	
		}
	}
?>