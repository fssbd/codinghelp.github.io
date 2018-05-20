<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<style type="text/css">
	.sclForm{
		border: 1px solid #315C7E;
		width: 70%;
		margin: 70px auto;
		padding: 30px;
		border-radius: 5px;
	}
	input.medium {
		width: 98%;
		height:22px;
	}
	
	.btnSubmit{
		margin-top:10px;
	}
</style>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						
						if($role == '0' || $role == '2')
						{
							$fb = $fm->validation($_POST['fb']);
							$tw = $fm->validation($_POST['tw']);
							$ln = $fm->validation($_POST['ln']);
							$gp = $fm->validation($_POST['gp']);
							
							$fb    = mysqli_real_escape_string($db->link1, $fb);
							$tw    = mysqli_real_escape_string($db->link1, $tw);
							$ln    = mysqli_real_escape_string($db->link1, $ln);
							$gp    = mysqli_real_escape_string($db->link1, $gp);
							
							if($fb == "" || $tw == "" || $ln == "" || $gp == "")
							{
								echo "<span class='error'>Field must not be empty !!</span>";
							}
							
							else
							{
								$query = "UPDATE tbl_social 
											SET 
											fb  = '$fb',
											tw  = '$tw',
											ln  = '$ln',
											gp = '$gp'
											WHERE id = '1'";
										
								$updated_rows = $db->update($query);
								if ($updated_rows) 
								{
									echo "<span class='success'>Data Updated Successfully.</span>";
								}
								else 
								{
									echo "<span class='error'>Data Not Updated !!</span>";
								}
							}
						}
						
						else
						{
							echo "<span class='error'>Error!! Only Admin and Editor Can Update Social Media.</span>";
						}
						
						
						
						
					}
				?>
                <div class="block">           
				<?php
					$query = "select * from tbl_social where id = '1'";
					$social_media = $db->select($query);
					if($social_media)
					{
						while($result = $social_media->fetch_assoc()) 
						{
				?>				
                 <form action="social.php" method="post" class="sclForm">
                    <table class="form">					
                        <tr>
                            <td width="20%">
                                <label>Facebook:</label>
                            </td>
                            <td width="80%">
                                <input type="text" name="fb" value="<?php echo $result['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter:</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $result['tw'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn:</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $result['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus:</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php echo $result['gp'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" class="btnSubmit" />
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php } } ?>
                </div>
            </div>
        </div>
<?php include "inc/footer.php"; ?>