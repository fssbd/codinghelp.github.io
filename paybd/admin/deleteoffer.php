<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
	{
		header("Location:offerlist.php");
	}
	else
	{
		$deleteid=$_GET['deleteid'];
		
		$delquery = "delete from tbl_offers where offerId = '$deleteid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>window.location = 'offerlist.php'; </script>";
			echo "<script>alert('Offer Deleted Successfully !!')</script>";
		}
		else
		{
			echo "<script>alert('Offer Not Deleted !!')</script>";
			echo "<script>window.location = 'offerlist.php'; </script>";
		}
	}


?>