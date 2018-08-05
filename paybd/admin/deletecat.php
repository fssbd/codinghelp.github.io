<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
	{
		header("Location:catlist.php");
	}
	else
	{
		$deleteid=$_GET['deleteid'];
		
		$delquery = "delete from tbl_category where catId = '$deleteid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>window.location = 'catlist.php'; </script>";
			echo "<script>alert('Category Deleted Successfully !!')</script>";
		}
		else
		{
			echo "<script>alert('Category Not Deleted !!')</script>";
			echo "<script>window.location = 'catlist.php'; </script>";
		}
	}


?>