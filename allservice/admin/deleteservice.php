<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
	{
		header("Location:servicelist.php");
	}
	else
	{
		$deleteid=$_GET['deleteid'];
		
		$delquery = "delete from tbservice where serviceId = '$deleteid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>window.location = 'servicelist.php'; </script>";
			echo "<script>alert('service Deleted Successfully !!')</script>";
		}
		else
		{
			echo "<script>alert('service Not Deleted !!')</script>";
			echo "<script>window.location = 'servicelist.php'; </script>";
		}
	}


?>


