<?php include 'inc/header.php';?>
<?php
	if(!isset($_GET['deleteid']) || $_GET['deleteid']==NULL)
	{
		header("Location:booklist.php");
	}
	else
	{
		$deleteid=$_GET['deleteid'];
		
		$delquery = "delete from tbl_books where bookId = '$deleteid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>window.location = 'booklist.php'; </script>";
			echo "<script>alert('Book Deleted Successfully !!')</script>";
		}
		else
		{
			echo "<script>alert('Book Not Deleted !!')</script>";
			echo "<script>window.location = 'booklist.php'; </script>";
		}
	}


?>