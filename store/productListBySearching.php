<?php include "inc/header.php"; ?>

    <div class="container-fluid text-center">    
      <h3>CATEGORY WISE BOOK LIST</h3>
      <br>
      

	<?php
		if(!isset($_GET['search']) || $_GET['search']==NULL)
		{
			header("Location:index.php");
		}
		else
		{
			$productName=$_GET['search'];
		}


	?>      
      
      
      <div class="row">
       
       <?php
			$query="select distinct * from tbl_product where bookName like '%$productName%'";
			$selectData=$db->select($query);
			if($selectData)
			{
				while($result=$selectData->fetch_assoc())
				{
		?>       
        <div class="col-sm-2 books">
          <img src="admin/<?php echo $result['image']?>" class="img-responsive image" style="width:100%" alt="Image">
          <div class="middle">
            <button type="button" value="<?php echo $result['productId']?>" onclick="getBook(this.value)"  class="btn btn-primary" data-toggle="modal" data-target="#product_view"><i class="fa fa-search"></i> Quick View</button>
          </div>
          <p>Name: <?php echo $result['bookName']?></p>
          <p>Author Name: <?php echo $result['authorName']?></p>
          <p>Price: <?php echo $result['price']?></p>
        </div> 
        <?php }}
		  else
		  {
			  echo "<span style='color:red;font-size:18px;'>This BOOK is not available in any branch...!</span>";
		  }?>
      </div>
      <hr>
    </div>    
    
    
    <!--Quick View Action-->
    
	<div class="modal fade product_view" id="product_view">
		<div class="modal-dialog">
			<div class="modal-content" id="allvalue">
			
			</div>
		</div>
	</div>
	
<?php include "inc/footer.php"; ?>

<script type="text/javascript">
	function getBook(val){		
		$.ajax({
			type: "POST",
			url: "getBook.php",
			data: "productId="+val,
			success: function(data){
				$("#allvalue").html(data);
			}
		});
	}
</script>
