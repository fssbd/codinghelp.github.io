<?php include "inc/header.php"; ?>

    <div class="container-fluid text-center">    
      <h3>CATEGORY WISE BOOK LIST</h3>
      <br>
      

	<?php
		if(!isset($_GET['catId']) || $_GET['catId']==NULL)
		{
			header("Location:offerlist.php");
		}
		else
		{
			$catId=$_GET['catId'];
		}


	?>      
      
      
      <div class="row">
       
       <?php
			$query="select * from tbl_product where catId='$catId'";
			$selectData=$db->select($query);
			if($selectData)
			{
				while($result=$selectData->fetch_assoc())
				{
		?>
       
        <div class="col-sm-2 books">
          <a href="?productId=<?php echo $result['productId']?>"  data-toggle="modal" data-target="#product_view"><img src="admin/<?php echo $result['image']?>" class="img-responsive image" style="width:100%" alt="Image"></a>
          <div class="middle">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>
          </div>
          <p>Name: <?php echo $result['bookName']?></p>
          <p>Author Name: <?php echo $result['authorName']?></p>
          <p>Price: <?php echo $result['price']?></p>
        </div> 
        <?php
                    
        }}?>
      </div>
      <hr>
    </div>
    
    
    
    <!--Quick View Action-->
    
	<div class="modal fade product_view" id="product_view">
		<div class="modal-dialog">
			<div class="modal-content">
			<?php
				echo $_GET['productId'];
                exit;
				if(isset($_GET['productId']) || $_GET['productId']!=NULL)
				{
					$productId=$_GET['productId'];
				}
				
				$query1="select * from tbl_product where productId='$productId'";
				$selectData1=$db->select($query1);
				if($selectData1)
				{
					while($result1=$selectData1->fetch_assoc())
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
						
							<h4>Product Name: <span><?php echo $result1['productName']?></span></h4>
							<h4>Author Name: <span><?php echo $result1['authorName']?></span></h4>
							<h4>Status: <span>Available</span></h4>
							<h4>Price: <span><?php echo $result1['price']?></span></h4>
							<h4>Branch: <span><?php echo $result1['branchName']?></span></h4>
						
						</div>
					</div>
				</div>
				
			<?php }
				}
			?>
			</div>
		</div>
	</div>
	
<?php include "inc/footer.php"; ?>
