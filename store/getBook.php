<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>


<?php

	$db = new Database();

?>

	<?php

		$query="select * from tbl_product where productId='".$_POST['productId']."'";
		$selectBook=$db->select($query);
		if($selectBook)
		{
			while($result1=$selectBook->fetch_assoc())
				{
		?>
		<div class="modal-header">
			<a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
			<h3 class="modal-title">Product Details</h3>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6 product_img">
					<img src="admin/<?php echo $result1['image']?>" class="img-responsive">
				</div>
				<div class="col-md-6 product_content">

					<h4>Product Name: <span><?php echo $result1['bookName']?></span></h4>
					<h4>Author Name: <span><?php echo $result1['authorName']?></span></h4>
					<h4>Price: <span><?php echo $result1['price']?></span></h4>
					<h4>Branch: <span><?php echo $result1['branchName']?></span></h4>

				</div>
			</div>
		</div>
	
	<?php 
			}
		}
	?>