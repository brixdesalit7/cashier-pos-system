<?php 
    include('config.php');
	session_start();
	date_default_timezone_set("Asia/Manila");

	if(isset($_POST['payment'])) {
		// get the value of $_SESSION[user]
		$username = $_SESSION['user'];
		$total_amount = $_POST['total'];
		$amount_tendered = $_POST['amount_tendered'];
		$discount = $_POST['discount'];
		$amount_change = $_POST['amount_change'];
		$month = date('m');
		$year = date('Y');

		$sql = mysqli_query($conn, "INSERT INTO transaction_list(USERNAME, TOTAL_AMOUNT, TENDERED_AMOUNT, DISCOUNT, TOTAL_CHANGE,MONTH,YEAR) 
		VALUES('$username','$total_amount','$amount_tendered','$discount','$amount_change','$month','$year')");

			if($sql) {
				$success = "Payment Success";
			} else {
				$error = "Something went wrong";
			}
	}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS | Cashier POS System</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <!--  FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;1,100;1,300&display=swap" rel="stylesheet">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		// function to checkpayment
		function checkPayment() {
			// value of payable amount input form
			let priceToPay = document.forms["payment"]["total"].value;
			// value of tendered amount input form
			let tenderedAmount = document.forms["payment"]["amount_tendered"].value; 
			let valid = true;
			// if value of priceToPay is greater than tenderedAmount
			if(priceToPay > tenderedAmount) {
				// alert 
				alert("Insufficient amount");
				// set the value of valud to false
				valid = false;
			} else {
				// call receipt function
				printReceipt();
			}
			// return the value of valid
			return valid;
		}
		// function to print receipt
		function printReceipt() {	
			let conf = confirm("Print Receipt?");
			if (conf = true) {
				let myModalEl = document.getElementById('totalCount')
				let modal = bootstrap.Modal.getInstance(myModalEl)
				window.print();
			}  else if(conf == false ) {
				window.close();
			}
		}
		// function printdiv(printpage) {
		// 	var headstr = "<html><head><title></title></head><body>";
		// 	var footstr = "</body>";
		// 	var newstr = document.all.item(printpage).innerHTML;
		// 	var oldstr = document.body.innerHTML;
		// 	document.body.innerHTML = headstr+newstr+footstr;
		// 	window.print(); 
		// 	document.body.innerHTML = oldstr;
		// 	return false;
		// }
	</script>
</head>
<body>
	<!-- shortcut button -->
	<div class="bg-dark text-white p-3 shortcut">
		<div class="d-flex flex-row">
			<fieldset class="border border-light p-2 text-light ">
					<a href="home.php" accesskey="h"></a>
                    <legend class="text-light w-auto float-none fs-5">Keyboard Shortcuts</legend>
                    <label for="" class="fs-6">Ctrl + F1 = Focuses the BarCode Text Field.</label>
                    <label for="" class="mx-2 fs-6">Ctrl + F2 = Focuses the Name Text Field.</label>
                    <label for="" class="mx-2 fs-6">Ctrl + F3 = Focuses the Alias Text Field..</label>
					<label for="" class="mx-2 fs-6">Ctrl + M = Tender Amount</label>
					<label for="" class="mt-1">ALT + H = Go to Home Page</label>
            </fieldset>
		</div>
	</div>

	<div class="receipt">
			<h2>Cashier POS System</h2>
			<h4>using barcode scanner</h4>
			<p>Store: Sample</p>
			<p>Store Number: Sample</p>
			<p>Address: Sample</p>
			<p>BIR Acc#: Sample</p>
	</div>
    <!-- Page -->
	<div class="title d-sm-flex justify-content-between p-3 bg-light rounded ">
        <div class="title text-dark">
            <h3>POS</h3>
        </div>
		<div class="mt-3">
			<button type="button" class="btn btn-success d-block mx-auto px-5 py-2" data-bs-toggle="modal" data-bs-target="#totalCount">Payment</button>
		</div>
    </div>

    <div class="container-fluid mt-5">
	<!-- code to display message after query on database -->
	<div id="showMsg">
        <?php if($success){ ?>
        <div class="alert alert-success mt-1"><?php echo htmlentities($success);?></div>
        <?php  } else if($error){ ?>
        <div class="alert alert-danger mt-1"><?php echo htmlentities($error) ?></div>  
        <?php } ?>
    </div>
    <div class="product-list rounded-bottom  mh-100">
		<div class="page-content container-fluid">
		<div class="row">
			<div class="col-lg-12">
			<!-- Panel Standard Mode -->
			<div class="panel mt-3">
				<div class="panel-body">
				<form class="billingForm" method="POST" name="billingForm" id="dd" autocomplete="off">
					<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];?>" />
					<input type="hidden" id="invoice_id" name="invoice_id" value="<?php echo $invoice_id;?>" />
					<table id="app" class="table-responsive">
						<thead>
							<th class="bar_code">Barcode</th>
							<th>Name</th>
							<th class="alias">Alias</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Unit</th>
							<th>Sale Price</th>
						</thead>
						<tbody>
						<tr id="1">
						<td>
							<input class="barcode form-control" type="text" id="bar_code_1" autofocus required class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,1)" name="bar_code[]" />
						</td>
						<td>
							<select name="name[]" id="name_1" class="product_name form-control" onchange="get_detail_name(this.value,1)">
								<option value="">Choose Product</option>
								<!-- perform query to database -->
								<?php $sqlP = $conn->query("SELECT * FROM product ORDER BY name ASC");
								while($rowP = $sqlP->fetch_array()){?>
								<option value="<?php echo $rowP['name']?>"><?php echo $rowP['name'];?></option>
								<?php }?>
							</select>
						</td>
						<td>
							<input type="text" id="alias_1" class="alias form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,1)" name="alias[]" />
						</td>
						<td>
							<input type="text" required class="form-control" readonly id="mrp_1" name="mrp[]" />
						</td>
						<td>	
							<input type="number" class="form-control" onkeyup="calculate_price(this.value,1)" step="0.001" id="quantity_1" name="quantity[]" />
						</td>
						<td>
							<input type="text" readonly class="form-control" id="av_quantity_1" name="av_quantity[]" />
						</td>
						<td>
							<input type="number" required class="form-control" onkeyup="get_quantity(this.value,1)" step="0.01" id="sale_price_1" name="sale_price[]" />
							<input type="hidden" class="form-control" id="sale_price_org_1" name="sale_price_org[]" />
							<input type="hidden" class="form-control" id="igst_1" name="igst[]" />
						</td>
					</tbody>
					</table>
				
				</div>
			</form>
			</div>

		<!-- PRINT RECEIPT OUTPUT -->
		<div class="input-group ms-auto w-50">
			<div class="cash input-group w-50">
				<span class="input-group-text">Cash:<div id="output"></div></span>
			</div>
			<span class="input-group-text">Total Price:</span>
			<input type="number" class="form-control" readonly name="total"  id="getTotal" />
			<div class="input-group w-50">
				<span class="input-group-text">Discount%:</span>
				<input type="number" class="form-control" id="discount" name="discount">
			</div>
		</div>
		
		<div class="sample-text">
			<h6><b>This receipt is sample only.</b></h6>
		</div>

	</div>					
	</div>

		<!-- Modal Payment -->
		<div class="modal fade" id="totalCount">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Payment</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
			<form method="POST" onsubmit="return checkPayment()" name="payment">
				<div class="mt-1">
					<h5>Payable Amount</h5>
					<input type="number" class="form-control" readonly name="total" id="calcTotal"/>
				</div>
				<div class="mt-3">
					<h5>Tendered Amount</h5>
					<input type="number" class="form-control" id="tenderAmount" name="amount_tendered" autofocus required>
				</div>
				<div class="mt-3">
					<h5>Change</h5>
					<input type="number" class="form-control" id="change" readonly name="amount_change">
				</div>
				<button type="submit" name="payment" class="btn btn-primary mt-3">Save</button>
			</form>
			</div>
		
<script>
	$(document).ready(function() {
		$("#tenderAmount").on("input", function() {
		$("#output").text($(this).val());
		});
	});
	$('#totalCount').on('shown.bs.modal', function() {
		$('#tenderAmount').focus();
	})
	// math operation on payment
	$(document).on("input", "#discount", function() {
		var main = $('#getTotal').val();
		var disc = $('#discount').val();
		var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
		var mult = main * dec; // gives the value for subtract from main value
		var discont = main - mult;
		$('#calcTotal').val(discont);
		});
		$('#tenderAmount').on('input',function() {
		var tender = $(this).val()
		var change = 0;
		change = parseFloat(tender) - parseFloat($('#calcTotal').val());
		$('#change').val(parseFloat(change).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2,minimumFractionDigits:2}))
		$('[name="amount_change"]').val(parseFloat(change).toFixed(2))
		$('[name="amount_tendered"]').val(parseFloat(tender))
		})
</script>
		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		</div>
		</div>
		</div>
		</div>
		<?php 
			$monthNum  = date("m");
			$monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); // March
		?>

<script>
setTimeout(function() {
	// HIDE MESSAGE AFTER 3 SECONDS
    $('#showMsg').fadeOut('slow');
	}, 3000);
	// SHORCUT KEY FOR INPUT FORM
	$(window).on('keydown',function(e){
        if($.inArray(e.which,[112,113,114,115]) > -1 && e.ctrlKey == true){
            e.preventDefault()
            if(e.which == 112){
                $('#bar_code_1').val('').focus()
            }
            if(e.which == 113){
                $('#name_1').focus().select()
            }
            if(e.which == 114){
				$('#alias_1').val('').focus()
            }
			if(e.which == 115){
				window.history.back()
            }
        }
    })
    // OPEN PAYMENT MODAL USING KEYBOARD
	$(document).on('keydown', function (e) {
    // You may replace `m` with whatever key you want
    if ((e.metaKey || e.ctrlKey) && ( String.fromCharCode(e.which).toLowerCase() === 'm') ) {
		$("#totalCount").modal('show');
    }
});
	// DISCOUNT FUNCTION
	$(document).on("change keyup blur", "#priceDiscount", function() {
	var main = $('#getTotal').val();
	var disc = $('#priceDiscount').val();
	var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
	var mult = main*dec; // gives the value for subtract from main value
	var discont = main-mult;
	$('#getTotal').val(discont);
	});
</script>

<script type="text/javascript">
// prevent space
function RestrictSpace() {
    if (event.keyCode == 32) {
        return false;
    }
}
// onload focus on barcode input form
function default_focus() {
	document.getElementById('bar_code_1').focus();
}

// barcode input form
// call on onchange
// get_detail(this.value,1)
function get_detail(b,n) {
	// add unique number to new html created html element
	var nx = n+1;
	// ajax request
	$.ajax({  
		// type of request
		type:"POST", 
		// url or file to send request 
		url:"ajax_product.php",  
		// data to be sent to server
		data:{bar_code:b,action_type:"get_detail"},
		// function to run if request is success
		success:function(data){
			// convert JSON to JavaScript Object
			var data = $.parseJSON(data);
			if(data.type == 'Success') {
				
				//Check for duplicate value in input form
				var barCode = document.querySelectorAll("#dd input[name='bar_code[]']");
				for(key = 0; key < barCode.length - 1; key++)  {
					if(barCode[key].value == data.bar_code){
						alert("Already Exist");
						document.getElementById('bar_code_'+n).value = '';
						document.getElementById('bar_code_'+n).focus();
						return false;
					}					
				}
				// append html element to #app tbody
				var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text" autofocus  class="barcode form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control alias" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" onkeyup="get_quantity(this.value,'+nx+')" name="sale_price[]" step="0.01" required /><input type="hidden" class="form-control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove"><img src="img/close.png" width="30"></a></td></tr>');
				// assign response value from ajax request to new html element
				document.getElementById('name_'+n).value = data.name;
				document.getElementById('alias_'+n).value = data.alias;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('av_quantity_'+n).value = data.av_quantity;
				document.getElementById('sale_price_'+n).value = data.sale_price;
				document.getElementById('sale_price_org_'+n).value = data.sale_price;
				document.getElementById('igst_'+n).value = data.igst;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				document.getElementById('calcTotal').value = Math.round(parseFloat(aac));
				document.getElementById('bar_code_'+nx).focus();
			} else {
				// alert if barcode not found
				alert("Barcode Not Found");
				// clear barcode input form
				document.getElementById('bar_code_'+n).value = '';
				// focus on barcode input form
				document.getElementById('bar_code_'+n).focus();
				return false;
			}
		}  
	});
}
// choose product input form
// call on onchange
// get_detail_name(this.value,1)
function get_detail_name(i,n) {
	var nx = n+1;
	
	$.ajax({  
		type:"POST",  
		url:"ajax_product.php",  
		data:{name:i,action_type:"get_detail_by_name"},
		success:function(data){ 
			var data = $.parseJSON(data);
			if(data.type == 'Success'){
				
				//Check Duplicate Value
				var barCode = document.querySelectorAll("#dd input[name='bar_code[]']");
				for(key=0; key < barCode.length - 1; key++)  {
					if(barCode[key].value == data.bar_code){
						alert("Already Exist");
						return false;
					}					
				}
								
				//Appending New Row
				var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text" autofocus  class="barcode form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control alias" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" onkeyup="get_quantity(this.value,'+nx+')" name="sale_price[]" step="0.01" required /><input type="hidden" class="form-control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove"><img src="img/close.png" width="30"></a></td></tr>');
				document.getElementById('bar_code_'+n).value = data.bar_code;
				document.getElementById('alias_'+n).value = data.alias;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('av_quantity_'+n).value = data.av_quantity;
				document.getElementById('sale_price_'+n).value = data.sale_price;
				document.getElementById('sale_price_org_'+n).value = data.sale_price;
				document.getElementById('igst_'+n).value = data.igst;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				document.getElementById('calcTotal').value = Math.round(parseFloat(aac));

				
				document.getElementById('name_'+nx).focus();
			}else{
				alert("Prduct Not Found!");
			}
		}  
	});
}
// alias input form
// call on onchange
// get_detail_alias(this.value,1)
function get_detail_alias(a,n) {
	var nx = n+1;
	
	$.ajax({  
		type:"POST",  
		url:"ajax_product.php",  
		data:{alias:a,action_type:"get_detail_by_alias"},
		success:function(data){
			
			var data = $.parseJSON(data);
			if(data.type == 'Success'){
				
				//Check Duplicate Value
				var aliasA = document.querySelectorAll("#dd input[name='alias[]']");
				for(key=0; key < aliasA.length - 1; key++)  {
					if(aliasA[key].value == data.alias){
						alert("Alias Exist");
						document.getElementById('alias_'+n).value = '';
						document.getElementById('alias_'+n).focus();
						return false;
					}					
				}
				
				var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text" autofocus  class="barcode form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control alias" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" onkeyup="get_quantity(this.value,'+nx+')" name="sale_price[]" step="0.01" required /><input type="hidden" class="form-control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove"><img src="img/close.png" width="30"></a></td></tr>');
				document.getElementById('name_'+n).value = data.name;
				document.getElementById('bar_code_'+n).value = data.bar_code;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('av_quantity_'+n).value = data.av_quantity;
				document.getElementById('sale_price_'+n).value = data.sale_price;
				document.getElementById('sale_price_org_'+n).value = data.sale_price;
				document.getElementById('igst_'+n).value = data.igst;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				document.getElementById('calcTotal').value = Math.round(parseFloat(aac));

				
				document.getElementById('bar_code_'+nx).focus();
			} else {
				alert("Alias Not Found");
				document.getElementById('alias_'+n).value = '';
				document.getElementById('alias_'+n).focus();
				return false;
			}
		}  
	});
}

function getSum(total, num) {
return parseFloat(total + num);
}

// quantity input form
// call on keyup
// get_quantity(this.value, 1)
function get_quantity(p,n) {
	// value of sale price input form
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");

	var newA = [];
	for(key = 0; key < salePrice.length; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	//alert(newA);
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	//alert(aac);
	
	var sale_price_org = document.getElementById('sale_price_org_'+ n).value;
	var spgF = parseFloat(sale_price_org);
	var sp = document.getElementById('sale_price_'+ n).value;
	var spF = parseFloat(sp);
	document.getElementById('quantity_'+ n ).value = (p / parseFloat(sale_price_org)).toFixed(3);
		
}

// remove input form
function remove_data(r) {
	$('#'+r).remove();
	//Get Value For Total
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
	var newA = [];
	for(key = 0; key < salePrice.length; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	document.getElementById('calcTotal').value = Math.round(parseFloat(aac));
}
</script>

</body>
</html>