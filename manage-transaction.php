<?php include_once('db_conn/db_conn.php'); 
session_start();

?>

<!-- Delete Products -->
<div class="modal fade" id="delProducts<?php echo htmlentities($result->ID);?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h5 class="modal-title">Delete Product</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<?php
$sql = "SELECT * FROM transaction_list WHERE ID ='".$result->ID."' ";
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
<h6>Are you sure to delete this transaction from the list?</h6>
</form>
</div>


<!-- Modal footer -->
<div class="modal-footer">
<a href="transaction-list.php?del=<?php echo htmlentities($result->ID);?>" class="btn btn-success">Delete</a>
<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>
</form>
<?php }} ?>
</div>
</div>
</div>



