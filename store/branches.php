<?php include "inc/header.php";?> 

<?php

	$db = new Database();

?>

    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">Branches</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
	   <?php
			$query="select * from tbl_branch";
			$post=$db->select($query);
			if($post)
			{
				while($result=$post->fetch_assoc())
				{
		?>
				
            <div class="col-md-12">
                <legend><span class="glyphicon glyphicon-globe"></span> <?php echo $result['branchName']; ?> </legend>
                    <p> <?php echo $result['branchAddress']; ?> </p>
                <br>
            </div>
		<?php 
				}
			}
		?>
            
            <!--<div class="col-md-12">
                <legend><span class="glyphicon glyphicon-globe"></span> Event Name</legend>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>-->
        </div>
    </div>
<?php include "inc/footer.php"; ?>
