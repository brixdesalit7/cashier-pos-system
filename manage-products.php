<?php include_once('db_conn/db_conn.php'); 
session_start();

?>
<!-- Edit Products -->
<div class="modal fade" id="editProducts<?php echo htmlentities($result->id);?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title">Edit Product</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<?php
$sql = "SELECT * FROM product WHERE id ='".$result->id."' ";
$query = $conn->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
?>
<!-- Modal body -->
<div class="modal-body">
<form method="POST" action="edit-products.php?id=<?php echo htmlentities($result->id);?>">
<div class="mb-1">
<label>Barcode</label>
<input type="number" class="form-control" name="code" value="<?php echo htmlentities($result->bar_code);?>" required>
</div>
<div class="mt-2">
<label>Unit</label>
<select class="form-select" name="unit" required>
<option value="<?php echo htmlentities($result->unit);?>"><?php echo htmlentities($result->unit);?></option>
<?php if($result->unit == 'Box') { ?>
<option>Pcs</option>
<?php } else { ?>
<option>Box</option>
<?php } ?>
</select>
</div>
<div class="mt-2">
<label>Name</label>
<input type="text" class="form-control" name="name"  value="<?php echo htmlentities($result->name);?>"  required>
</div>
<div class="mt-2">
<label>Alias</label>
<input type="text" class="form-control"  name="descript" placeholder="Optional" value="<?php echo htmlentities($result->alias);?>"></input>
</div>
<div class="mt-2">
<label>Price</label>
<input type="number" class="form-control" name="price"  value="<?php echo htmlentities($result->mrp);?>"  required>
</div>
<div class="mt-2">
<label>Sale Price</label>
<input type="number" class="form-control" name="sale_price"  value="<?php echo htmlentities($result->sale_price);?>"  required>
</div>                     
</div>
<?php }} ?>

<!-- Modal footer -->
<div class="modal-footer">
<button class="btn btn-success" name="edit" type="submit">Save</button>
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>

<!-- Delete Products -->
<div class="modal fade" id="delProducts<?php echo htmlentities($result->id);?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title">Delete Product</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<?php
$sql = "SELECT * FROM product WHERE id ='".$result->id."' ";
$query = $conn->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
                         
?>
<!-- Modal body -->
<div class="modal-body">
<form method="POST">
<h6>Are you sure to delete <b><?php echo htmlentities($result->name);?></b> from the list?</h6>
</form>
</div>


<!-- Modal footer -->
<div class="modal-footer">
<a href="product-list.php?del=<?php echo htmlentities($result->id);?>" class="btn btn-success">Delete</a>
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>
</form>
<?php }} ?>
</div>
</div>
</div>



