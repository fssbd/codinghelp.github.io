<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
	{
		header("Location:productlist.php");
	}
	else
	{
		$deleteid=$_GET['deleteid'];
		
		$delquery = "delete from tbl_product where productId = '$deleteid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>window.location = 'productlist.php'; </script>";
			echo "<script>alert('Product Deleted Successfully !!')</script>";
		}
		else
		{
			echo "<script>alert('Product Not Deleted !!')</script>";
			echo "<script>window.location = 'productlist.php'; </script>";
		}
	}


?>