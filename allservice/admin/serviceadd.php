
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Service</h2>
        <div class="block">   
<?php

	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$ServiceName=$_POST['ServiceName'];
		$ServiceName=mysqli_real_escape_string($db->link,$ServiceName);
		$ServiceDescription=$_POST['ServiceDescription'];
		$ServiceDescription=mysqli_real_escape_string($db->link,$ServiceDescription);
		if(!empty($ServiceName))
		{
			if(!empty($ServiceDescription))
			{
				$query="insert into tbService (ServiceName,ServiceDescription) values('$ServiceName','$ServiceDescription')";
				$Serviceinsert=$db->insert($query);
				if($Serviceinsert)
				{
					echo "<span style='color:green;font-size:18px;'>Service Inserted Successfully.</span>";
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>Service Not Inserted !</span>";
				}
			}
			else
			{
				echo "<span style='color:red;font-size:18px;'>Service Description Field must not be empty</span>";
			}
		}
		else
	    {
			echo "<span style='color:red;font-size:18px;'>Service Name Field must not be empty</span>";
	    }
	}
?>
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Service Name</label>
                    </td>
                    <td>
                        <input type="text" name="ServiceName" placeholder="Service Name.." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Service Description</label>
                    </td>
                    <td>
                        <input type="text" name="ServiceDescription" placeholder="Service Description.." class="medium" />
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