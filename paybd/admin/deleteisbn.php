<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
	{
		header("Location:isbnlist.php");
	}
	else
	{
		$deleteid=$_GET['deleteid'];
		
		$delquery = "delete from tbl_isbn where isbnId = '$deleteid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>window.location = 'isbnlist.php'; </script>";
			echo "<script>alert('ISBN Deleted Successfully !!')</script>";
		}
		else
		{
			echo "<script>alert('ISBN Not Deleted !!')</script>";
			echo "<script>window.location = 'isbnlist.php'; </script>";
		}
	}


?>