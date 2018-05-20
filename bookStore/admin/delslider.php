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
	if(!isset($_GET['delsliderid']) || $_GET['delsliderid'] == NULL)
	{
		echo "<script>window.location = 'sliderlist.php'; </script>";
	}
	else
	{
		$delsliderid = $_GET['delsliderid'];
		$query = "select * from tbl_slider where id='$delsliderid'"; 
		$getslider = $db->select($query);
		
		if($getslider)
		{
			while($delimg = $getslider->fetch_assoc())
			{
				$dellink = $delimg['image'];
				unlink($dellink);
			}
		}
		
		$delquery = "delete from tbl_slider where id = '$delsliderid'";
		$deldata = $db->deletedata($delquery);
		
		if($deldata)
		{
			echo "<script>alert('Slider Deleted Successfully !!')</script>";
			echo "<script>window.location = 'sliderlist.php'; </script>";
		}
		else
		{
			echo "<script>alert('Slider Not Deleted !!')</script>";
			echo "<script>window.location = 'sliderlist.php'; </script>";
		}
	}
?>
  
