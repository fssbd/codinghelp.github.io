
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Event</h2>
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
				$query="insert into tbl_events (eventName,eventDescription) values('$eventName','$eventDescription')";
				$eventinsert=$db->insert($query);
				if($eventinsert)
				{
					echo "<span style='color:green;font-size:18px;'>Event Inserted Successfully.</span>";
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>Event Not Inserted !</span>";
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
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Event Name</label>
                    </td>
                    <td>
                        <input type="text" name="eventName" placeholder="Event Name.." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Event Description</label>
                    </td>
                    <td>
                        <input type="text" name="eventDescription" placeholder="Event Description.." class="medium" />
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
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>