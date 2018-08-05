<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
							$query="insert into tbl_category(catName) values('$catName')";
							$catinsert=$db->insert($query);
							if($catinsert)
							{
								echo "<span style='color:green;font-size:18px;'>Category Name Inserted Successfully.</span>";
							}
							else
							{
								echo "<span style='color:red;font-size:18px;'>Category Name Not Inserted !</span>";
							}
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>Category Name Field must not be empty</span>";
						}
					}
				?>   
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
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