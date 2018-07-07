
<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>





  <!-- Services -->
<div class="container leftToRight">
	<div class="row">
      <div class="col-md-12">
        <p class="main_title"><span>OUR SERVICES</span></p>
      </div>
    </div>
    <div class="row">
  	<?php
		$query="select serviceId,serviceName,serviceDescription from tbService";
		$selectData=$db->select($query);
		if($selectData)
		{
			while($result=$selectData->fetch_assoc())
			{
	  	?>
		  <a href="services.php?id=<?php echo $result['serviceId'];?>">
		  <div class="col-md-3 boxBorder">
			<div class="box">
			  <div class="box-icon"> <span class="fa fa-4x fa-magic"></span> </div>
			  <div class="info">
				<h4 class="text-center"><?php echo $result['serviceName']; ?></h4>
				<p><?php echo $result['serviceDescription']; ?></p>
			  </div>
			</div>
		  </div>
		  </a>
		<?php 
				}
			}
		?>
   
    </div>
</div>
 <br>
  <!-- Services -->

<?php include "inc/footer.php"; ?>