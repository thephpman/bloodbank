<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Blood Groups</h1>
	</div>
	<div class="content-header-right">
		<a href="blood-group-add.php" class="btn btn-primary btn-sm">Add New</a>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-info">

        <div class="box-body table-responsive">

            <?php
            if(isset($_REQUEST['msg'])) {
                if($_REQUEST['msg'] == 1) {
                    echo '<div class="error">You can not delete this blood group because this is used in the car table</div>';
                }
            }
            ?>
            <table id="example1" class="table table-bordered table-striped">
    			<thead>
    			    <tr>
    			        <th>SL</th>
    			        <th>Blood Group</th>
    			        <th>Action</th>
    			    </tr>
    			</thead>
                <tbody>
                	<?php
                	$i=0;
                	$statement = $pdo->prepare("SELECT * FROM tbl_blood_group ORDER BY blood_group_id ASC");
                	$statement->execute();
                	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
                	foreach ($result as $row) {
                		$i++;
    	            	?>
    	                <tr>
    	                    <td><?php echo $i; ?></td>
    	                    <td><?php echo $row['blood_group_name']; ?></td>
    	                    <td>
    	                        <a href="blood-group-edit.php?id=<?php echo $row['blood_group_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
    	                        <a href="#" class="btn btn-danger btn-xs" data-href="blood-group-delete.php?id=<?php echo $row['blood_group_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
    	                    </td>
    	                </tr>
    	                <?php
                	}
                	?>
                </tbody>
            </table>
        </div>
      </div>

</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?<br>
                Be Careful! All car under this blood group will be deleted also.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>
