<?php ?>
<?php
//include '../lib/session.php';
//Session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php include '../helpers/format.php'; ?>
<?php
	$db = new Database();
	$fm = new Format();
?>
<?php
	if(!isset($_GET['delpostid']) || $_GET['delpostid'] == NULL)
	{
		echo "<script>window.location = 'postlist.php'; </script>";
	}
	else
	{
		$postid = $_GET['delpostid'];
		$query = "select * from tbl_post where id='$postid'"; 
		$getdata = $db->select($query);
		
		if($getdata)
		{
			while($delimg = $getdata->fetch_assoc())
			{
				$dellink = $delimg['image'];
				unlink($dellink);
			}
		}
		
		$delquery = "delete from tbl_post where id = '$postid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>alert('Data Deleted Successfully !!')</script>";
			echo "<script>window.location = 'postlist.php'; </script>";
		}
		else
		{
			echo "<script>alert('Data Not Deleted !!')</script>";
			echo "<script>window.location = 'postlist.php'; </script>";
		}
	}
?>
  
