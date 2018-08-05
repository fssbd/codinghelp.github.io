<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:offerlist.php");
	}
	else
	{
		$id=$_GET['editid'];
	}


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Offer</h2>
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
						$query="Update tbl_offers set offerName='$offerName',offerDescription='$offerDescription' where offerId='$id'";
						$offerUpdate=$db->update($query);
						if($offerUpdate)
						{
							echo "<span style='color:green;font-size:18px;'>Offer Updated Successfully.</span>";
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>Offer Not Updated !</span>";
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
		<?php
			$query="select * from tbl_offers where offerId='$id' order by offerId desc";
			$offerh=$db->select($query);
			while($result=$offerh->fetch_assoc())
			{

		?>              
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Offer Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['offerName']; ?>" name="offerName" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Offer Description</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['offerDescription']; ?>" name="offerDescription" class="medium" />
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