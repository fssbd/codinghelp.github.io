<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Offer</h2>
        <div class="block"> 
<?php

	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$offerName=$_POST['offerName'];
		$offerName=mysqli_real_escape_string($db->link,$offerName);
		$offerDescription=$_POST['offerDescription'];
		$offerDescription=mysqli_real_escape_string($db->link,$offerDescription);
		if(!empty($offerName))
		{
			if(!empty($offerDescription))
			{
				$query="insert into tbl_offers (offerName,offerDescription) values('$offerName','$offerDescription')";
				$offerinsert=$db->insert($query);
				if($offerinsert)
				{
					echo "<span style='color:green;font-size:18px;'>Offer Inserted Successfully.</span>";
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>Offer Not Inserted !</span>";
				}
			}
			else
			{
				echo "<span style='color:red;font-size:18px;'>Offer Description Field must not be empty</span>";
			}
		}
		else
	    {
			echo "<span style='color:red;font-size:18px;'>Offer Name Field must not be empty</span>";
	    }
	}
?>              
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Offer Name</label>
                    </td>
                    <td>
                        <input type="text" name="offerName" placeholder="Offer Name.." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Offer Description</label>
                    </td>
                    <td>
                        <input type="text" name="offerDescription" placeholder="Offer Description.." class="medium" />
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