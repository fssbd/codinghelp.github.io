<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>






<div class="grid_10">
    <div class="box round first grid">
        <h2>ISBN Details List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Book Name</th>
					<th>ISBN Code</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query="select * from tbl_isbn";
					$selectData=$db->select($query);
					if($selectData)
					{
						$i=1;
						while($result=$selectData->fetch_assoc())
						{
				?>
						<tr class="odd gradeX">
							<td> <?php echo $i; ?> </td>
							<td> <?php echo $result['bookName']; ?> </td>
							<td> <?php echo $result['isbnCode']; ?> </td>
							<td><a href="editisbn.php?editid=<?php echo $result['isbnId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="deleteisbn.php?deleteid=<?php echo $result['isbnId'];?>">Delete</a></td>
						</tr>
				<?php $i++;
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
