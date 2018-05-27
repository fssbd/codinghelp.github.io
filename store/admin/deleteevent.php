<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
	{
		header("Location:eventlist.php");
	}
	else
	{
		$deleteid=$_GET['deleteid'];
		
		$delquery = "delete from tbl_events where eventId = '$deleteid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>window.location = 'eventlist.php'; </script>";
			echo "<script>alert('Event Deleted Successfully !!')</script>";
		}
		else
		{
			echo "<script>alert('Event Not Deleted !!')</script>";
			echo "<script>window.location = 'eventlist.php'; </script>";
		}
	}


?>


