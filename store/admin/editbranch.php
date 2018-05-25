<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:branchlist.php");
	}
	else
	{
		$id=$_GET['editid'];
	}


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Branch</h2>
               <div class="block copyblock"> 
			   <?php


					if($_SERVER['REQUEST_METHOD']=='POST')
					{
						$branchName=$_POST['branchName'];
						$branchName=mysqli_real_escape_string($db->link,$branchName);
						$branchAddress=$_POST['branchAddress'];
						$branchAddress=mysqli_real_escape_string($db->link,$branchAddress);
						if(!empty($branchName))
						{
							if(!empty($branchAddress))
							{
								$query="update tbl_branch set branchName='$branchName' ,branchAddress='$branchAddress' where branchId='$id'";
								$branchinsert=$db->update($query);
								if($branchinsert)
								{
									echo "<span style='color:green;font-size:18px;'>branch Update Successfully.</span>";
								}
								else
								{
									echo "<span style='color:red;font-size:18px;'>branch Not Update !</span>";
								}
							}
							else
							{
								echo "<span style='color:red;font-size:18px;'>branch Address Field must not be empty</span>";
							}
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>branch Name Field must not be empty</span>";
						}
					}
				 ?>
                <?php
					$query="select * from tbl_branch where branchId='$id' order by branchId desc";
					$branch=$db->select($query);
					while($result=$branch->fetch_assoc())
					{
						
				?> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['branchName']; ?>" name="branchName" class="medium" />
                            </td>
                        </tr>				
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['branchAddress']; ?>"  name="branchAddress"  class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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