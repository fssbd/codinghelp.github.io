<?php include "inc/header.php";?> 

<?php

	$db = new Database();

?>

    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">Events</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
	   <?php
			$query="select * from tbl_events";
			$post=$db->select($query);
			if($post)
			{
				while($result=$post->fetch_assoc())
				{
		?>
				
            <div class="col-md-12">
                <legend><span class="glyphicon glyphicon-globe"></span> <?php echo $result['eventName']; ?> </legend>
                    <p> <?php echo $result['eventDescription']; ?> </p>
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
