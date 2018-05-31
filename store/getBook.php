<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>


<?php

	$db = new Database();

?>

	<?php

		$image="";
		$bookName="";
		$authorName="";
		$price="";
		$branchName="";
		$totalBranchName="";

		$query="select * from tbl_product where bookName='".$_POST['bookName']."'";
		$selectBook=$db->select($query);
		if($selectBook)
		{
			$i=0;
			while($result1=$selectBook->fetch_assoc())
				{
					$image=$result1['image'];
					$bookName=$result1['bookName'];
					$authorName=$result1['authorName'];
					$price=$result1['price'];
				
					if($i==0)
					{
						$branchName=$result1['branchName'];
					}
					else
					{
						$branchName=$branchName.",".$result1['branchName'];
					}
					
					$i++;
				}
		}	?>
		<div class="modal-header">
			<a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
			<h3 class="modal-title">Product Details</h3>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6 product_img">
					<img src="admin/<?php echo $image;?>" class="img-responsive">
				</div>
				<div class="col-md-6 product_content">

					<h4>Product Name: <span><?php echo $bookName;?></span></h4>
					<h4>Author Name: <span><?php echo $authorName;?></span></h4>
					<h4>Price: <span><?php echo $price;?></span></h4>
					<h4>Branch: <span><?php echo $branchName;?></span></h4>

				</div>
			</div>
		</div>
	
	