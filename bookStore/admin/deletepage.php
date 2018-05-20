<?php ?>
<?php
//include '../lib/session.php';
//Session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php
	$db = new Database();
?>
<?php
	if(!isset($_GET['delpageid']) || $_GET['delpageid'] == NULL)
	{
		echo "<script>window.location = 'index.php'; </script>";
	}
	else
	{
		$pageid = $_GET['delpageid'];
		 
		
		$delquery = "delete from tbl_page where id = '$pageid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>alert('Page Deleted Successfully !!')</script>";
			echo "<script>window.location = 'index.php'; </script>";
		}
		else
		{
			echo "<script>alert('Page Not Deleted !!')</script>";
			echo "<script>window.location = 'postlist.php'; </script>";
		}
	}
?>
  
