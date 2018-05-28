<?php
	$con = mysqli_connect("localhost","root","") or die ("Couldn't Connect to Server");
	$db = mysqli_select_db($con,"db_shop") or die ("Couldn't Select Database");
	
	$select = mysqli_query($con,"select * from tbl_product where productId='".$_POST['productId']."'");

	while($result1 = mysqli_fetch_array($select)){
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
				<h4>Status: <span>Available</span></h4>
				<h4>Price: <span><?php echo $result1['price']?></span></h4>
				<h4>Branch: <span><?php echo $result1['branchName']?></span></h4>
			
			</div>
		</div>
	</div>
	
<?php }
?>