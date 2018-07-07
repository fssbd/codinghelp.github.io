<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>User ID</th>
							<th>User Name</th>
							<th>User Gender</th>
							<th>User Country</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td> 1</td>
							<td> User Id</td>
							<td> User Name</td>
							<td> Male</td>
							<td> Bangladesh</td>
							<td><a href="edituser.php?editid=<?php echo $result['userId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="deleteuser.php?deleteid=<?php echo $result['userId'];?>">Delete</a></td>
						</tr>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

