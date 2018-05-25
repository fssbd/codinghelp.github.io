<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
								$query="insert into tbl_branch (branchName,branchAddress) values('$branchName','$branchAddress')";
								$branchinsert=$db->insert($query);
								if($branchinsert)
								{
									echo "<span style='color:green;font-size:18px;'>branch Inserted Successfully.</span>";
								}
								else
								{
									echo "<span style='color:red;font-size:18px;'>branch Not Inserted !</span>";
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
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="branchName" placeholder="Enter Branch Name..." class="medium" />
                            </td>
                        </tr>				
                        <tr>
                            <td>
                                <input type="text" name="branchAddress" placeholder="Enter Branch Addresss..." class="medium" />
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