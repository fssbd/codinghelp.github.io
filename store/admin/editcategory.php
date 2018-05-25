<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>





<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:catlist.php");
	}
	else
	{
		$id=$_GET['editid'];
	}


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <div class="block copyblock"> 
				<?php

					if($_SERVER['REQUEST_METHOD']=='POST')
					{
						$catName=$_POST['catName'];
						$catName=mysqli_real_escape_string($db->link,$catName);
						if(!empty($catName))
						{
							$query="update tbl_category set catName='$catName' where catId='$id'";
							$catupdate=$db->update($query);
							if($catupdate)
							{
								echo "<span style='color:green;font-size:18px;'>Category Name Update Successfully.</span>";
							}
							else
							{
								echo "<span style='color:red;font-size:18px;'>Category Name Not Update !</span>";
							}
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>Category Name Field must not be empty</span>";
						}
					}
				?> 
                <?php
					$query="select * from tbl_category where catId='$id' order by catId desc";
					$category=$db->select($query);
					while($result=$category->fetch_assoc())
					{
						
				?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName'] ?>" name="catName" class="medium" />
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