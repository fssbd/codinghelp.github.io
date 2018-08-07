<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
	{
		header("Location:branchlist.php");
	}
	else
	{
		$deleteid=$_GET['deleteid'];
		
		$delquery = "delete from tbl_branch where branchId = '$deleteid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>window.location = 'branchlist.php'; </script>";
			echo "<script>alert('Branch Deleted Successfully !!')</script>";
		}
		else
		{
			echo "<script>alert('Branch Not Deleted !!')</script>";
			echo "<script>window.location = 'branchlist.php'; </script>";
		}
	}


?>