<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<?php
	if(!isset($_GET['pageid']) || ($_GET['pageid'] == NULL))
	{
		echo "<script>window.location = 'index.php'; </script>";
	}
	else
	{
		$id = $_GET['pageid'];
	}
?>

<style>
	
	.actiondel{
		color:#444;
		border:1px solid #ddd;
		background:#ddd;
		cursor:pointer;
		font-size:20px;
		font-weight:normal;
		padding:4px 14px;
		margin-top:5px;
	}
	
	.aboutForm{
		width: 80%;
		border: 1px solid #315C7C;
		padding: 20px 30px;
		border-radius: 5px;
		margin: 10px auto;
	}
	input.medium {
		width: 97.2%;
		height:22px;
	}
	
	.btnSubmit{
		margin-top:5px;
	}
	
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Page</h2>
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						
						if($role == '0' || $role == '2')
						{
							$name  = mysqli_real_escape_string($db->link1, $_POST['name']);
							$body   = mysqli_real_escape_string($db->link1, $_POST['body']);
							
			
							if($name == "" || $body == "")
							{
								echo "<span class='error'>Field must not be empty !!</span>";
							} 
							else
							{
								$query = "UPDATE tbl_page 
										  SET 
										  name='$name', 
										  body='$body' 
										  WHERE id='$id'";
								
								$update_rows = $db->update($query);
								if ($update_rows) 
								{
									echo "<span class='success'>Page Updated Successfully.
									</span>";
								}
								else 
								{
									echo "<span class='error'>Page Not Updated !!</span>";
								}
							}
						}
						
						else
						{
							echo "<span class='error'>Error!! Only Admin and Editor Can Update Page.</span>";
						}
				
						
					}
				?>
				
                <div class="block">               
				
				<?php
					$pagequery = "select * from tbl_page where id = '$id'";
					$pageDetails = $db->select($pagequery);
					if($pageDetails)
					{
						while($result = $pageDetails->fetch_assoc()) 
						{
				?>
				
                 <form action="" method="post" class="aboutForm">
                    <table class="form">
                       
                        <tr>
                            <td width="13%">
                                <label>Name:</label>
                            </td>
                            <td width="87%">
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                  
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content:</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
									<?php echo $result['body']; ?>"
								</textarea>
                            </td>
                        </tr>
						
						<tr>
                            <td></td>
                            <td>
								<table>
									<tr>
										<td></td>
										<td> 
											<input type="submit" name="submit" Value="Update" class="btnSubmit"/>
										</td>
									</tr>
									<tr>
										<td></td>
										<td class="tblLink">
											<a onclick= "return confirm('Are you sure to Delete this page?');" class="actiondel" href="deletepage.php?delpageid=<?php echo $result['id']; ?>">Delete</a>
										</td>
									</tr>
								</table>
                            </td>
                        </tr>
                    </table>
					
                    </form>
					<?php } } ?>
                </div>
            </div>
        </div>
		

<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<!-- Load TinyMCE -->
		
<?php include "inc/footer.php"; ?>


 
