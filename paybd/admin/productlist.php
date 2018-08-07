<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>






<div class="grid_10">
    <div class="box round first grid">
        <h2>Book Details List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="10%">ISBN Code</th>
					<th width="10%">Book Name</th>
					<th width="20%">Author Name</th>
					<th width="5%">Qty</th>
					<th width="20%">Category</th>
                    <th width="10%">Branch</th>
					<th width="5%">Price</th>
					<th width="10%">Image</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query="select *,(select isbnCode from tbl_isbn where bookId=a.bookId) as isbnCode from tbl_product a";
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
                            <td> <?php echo $result['qty']; ?> </td>
							<td> <?php echo $result['catName']; ?> </td>
							<td> <?php echo $result['branchName']; ?> </td>
							<td> <?php echo $result['price']; ?> </td>
							<td> <img src="<?php echo $result['image']; ?>" alt="image" height="60px" width="40px"> </td>
							<td><a href="editproduct.php?editid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete! ');" href="deleteproduct.php?deleteid=<?php echo $result['productId'];?>">Delete</a></td>
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
