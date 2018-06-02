<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>






<div class="grid_10">
    <div class="box round first grid">
        <h2>Book List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="20%">Book Name</th>
					<th width="30%">Author Name</th>
					<th width="20%">Category</th>>
					<th width="10%">Price</th>
					<th width="10%">Image</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query="select * from tbl_books";
					$selectData=$db->select($query);
					if($selectData)
					{
						while($result=$selectData->fetch_assoc())
						{
				?>
						<tr class="odd gradeX">
							<td> <?php echo $result['bookName']; ?> </td>
							<td> <?php echo $result['authorName']; ?> </td>
							<td> <?php echo $result['catName']; ?> </td>
							<td> <?php echo $result['price']; ?> </td>
							<td> <img src="<?php echo $result['image']; ?>" alt="image" height="60px" width="40px"> </td>
							<td><a href="editbook.php?editid=<?php echo $result['bookId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="deletebook.php?deleteid=<?php echo $result['bookId'];?>">Delete</a></td>
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
