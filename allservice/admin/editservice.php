
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:servicelist.php");
	}
	else
	{
		$id=$_GET['editid'];
	}


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Update service</h2>
        <div class="block">   
		<?php


			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$serviceName=$_POST['serviceName'];
				$serviceName=mysqli_real_escape_string($db->link,$serviceName);
				$serviceDescription=$_POST['serviceDescription'];
				$serviceDescription=mysqli_real_escape_string($db->link,$serviceDescription);
				if(!empty($serviceName))
				{
					if(!empty($serviceDescription))
					{
						$query="update tbService set serviceName='$serviceName',serviceDescription='$serviceDescription' where serviceId='$id'";
						$serviceupdate=$db->update($query);
						if($serviceupdate)
						{
							echo "<span style='color:green;font-size:18px;'>service Update Successfully.</span>";
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>service Not Update !</span>";
						}
					}
					else
					{
						echo "<span style='color:red;font-size:18px;'>service Description Field must not be empty</span>";
					}
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>service Name Field must not be empty</span>";
				}
			}
		?>
		<?php
			$query="select * from tbService where serviceId='$id' order by serviceId desc";
			$serviceh=$db->select($query);
			while($result=$serviceh->fetch_assoc())
			{

		?>
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>service Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['serviceName']; ?>" name="serviceName" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>service Description</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['serviceDescription']; ?>" name="serviceDescription" class="medium" />
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