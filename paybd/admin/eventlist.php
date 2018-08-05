<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Events List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Event Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query="select * from tbl_events";
							$selectData=$db->select($query);
							if($selectData)
							{
								$i=0;
								while($result=$selectData->fetch_assoc())
								{
									$i++;
						?>
									<tr class="odd gradeX">
										<td> <?php echo $i; ?> </td>
										<td> <?php echo $result['eventName']; ?> </td>
										<td><a href="editevent.php?editid=<?php echo $result['eventId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="deleteevent.php?deleteid=<?php echo $result['eventId'];?>">Delete</a></td>
									</tr>
						<?php 
								}
							}
						?>
						
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

