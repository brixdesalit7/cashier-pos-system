<?php include_once('db_conn/db_conn.php'); 
session_start();

?>
<!-- Edit Products -->
<div class="modal fade" id="editUser<?php echo htmlentities($result->ID);?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title">Edit User</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<?php
$sql = "SELECT * FROM user WHERE id ='".$result->ID."' ";
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
<form method="POST" action="edit-user.php?id=<?php echo htmlentities($result->ID);?>">
<div class="mt-2">
<label>Name</label>
<input type="text" class="form-control" name="name"  value="<?php echo htmlentities($result->NAME);?>"  required>
</div>
<div class="mt-2">
<label>Username</label>
<input type="text" class="form-control" id="username" value="<?php echo htmlentities($result->USERNAME);?>" name="username" required>
</div>
<div class="mt-1">
<label>Type</label>
<select class="form-select" name="type" id="type">
<option value="<?php echo htmlentities($result->TYPE);?>"><?php echo htmlentities($result->TYPE);?></option>
<?php if($result->TYPE == 'Administrator') { ?>
<option>Cashier</option>
<?php } else { ?>
<option>Administrator</option>
<?php } ?>

</select>
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
<div class="modal fade" id="delUser<?php echo htmlentities($result->ID);?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title">Delete User</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<?php
$sql = "SELECT * FROM user WHERE id ='".$result->ID."' ";
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
<form methond="POST" >
<h6>Are you sure to delete <b><?php echo htmlentities($result->NAME);?></b> from the list?</h6>
</form>
</div>


<!-- Modal footer -->
<div class="modal-footer">
<a href="user-list.php?del=<?php echo htmlentities($result->ID);?>" class="btn btn-success">Delete</a>
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>
</form>
<?php }} ?>
</div>
</div>
</div>



