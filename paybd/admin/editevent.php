
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:eventlist.php");
	}
	else
	{
		$id=$_GET['editid'];
	}


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Event</h2>
        <div class="block">   
		<?php


			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$eventName=$_POST['eventName'];
				$eventName=mysqli_real_escape_string($db->link,$eventName);
				$eventDescription=$_POST['eventDescription'];
				$eventDescription=mysqli_real_escape_string($db->link,$eventDescription);
				if(!empty($eventName))
				{
					if(!empty($eventDescription))
					{
						$query="update tbl_events set eventName='$eventName',eventDescription='$eventDescription' where eventId='$id'";
						$eventupdate=$db->update($query);
						if($eventupdate)
						{
							echo "<span style='color:green;font-size:18px;'>Event Update Successfully.</span>";
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>Event Not Update !</span>";
						}
					}
					else
					{
						echo "<span style='color:red;font-size:18px;'>Event Description Field must not be empty</span>";
					}
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>Event Name Field must not be empty</span>";
				}
			}
		?>
		<?php
			$query="select * from tbl_events where eventId='$id' order by eventId desc";
			$eventh=$db->select($query);
			while($result=$eventh->fetch_assoc())
			{

		?>
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Event Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['eventName']; ?>" name="eventName" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Event Description</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['eventDescription']; ?>" name="eventDescription" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
           </form>
        <?php 
			}
		?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>