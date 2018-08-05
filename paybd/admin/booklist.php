<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>






<div class="grid_10">
    <div class="box round first grid">
        <h2>Book List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="10%">ISBN Code</th>
					<th width="20%">Book Name</th>
					<th width="25%">Author Name</th>
					<th width="15%">Category</th>
					<th width="10%">Price</th>
					<th width="10%">Image</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query="select *,(select isbnCode from tbl_isbn where bookId=a.bookId) as isbnCode from tbl_books a";
					$selectData=$db->select($query);
					if($selectData)
					{
						while($result=$selectData->fetch_assoc())
						{
				?>
						<tr class="odd gradeX">
							<td> <?php echo $result['isbnCode']; ?> </td>
							<td> <?php echo $result['bookName']; ?> </td>
							<td> <?php echo $result['authorName']; ?> </td>
							<td> <?php echo $result['catName']; ?> </td>
							<td> <?php echo $result['price']; ?> </td>
							<td> <img src="<?php echo $result['image']; ?>" alt="image" height="60px" width="40px"> </td>
							<td><a href="editbook.php?editid=<?php echo $result['bookId'];?>">Edit</a></td>
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
