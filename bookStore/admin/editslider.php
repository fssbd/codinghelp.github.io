<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<style type="text/css">
	.editSldForm{
		width: 70%;
		border: 1px solid #315C7C;
		padding: 20px 30px;
		border-radius: 5px;
		margin: 80px auto;
	}
	
	input.medium {
		width: 98%;
		height:22px;
	}
	
	.btnSubmit{
		margin-top:10px;
	}
</style>

<?php
	if(!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL)
	{
		echo "<script>window.location = 'sliderlist.php'; </script>";
	}
	else
	{
		$sliderid = $_GET['sliderid'];
	}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Slider</h2>
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$title  = mysqli_real_escape_string($db->link1, $_POST['title']);
						
						$permited  = array('jpg', 'jpeg', 'png', 'gif');
						$file_name = $_FILES['image']['name'];
						$file_size = $_FILES['image']['size'];
						$file_temp = $_FILES['image']['tmp_name'];

						$div = explode('.', $file_name);
						$file_ext = strtolower(end($div));
						$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
						$uploaded_image = "upload/slider".$unique_image;
		
						if($title == "")
						{
							echo "<span class='error'>Field must not be empty !!</span>";
						}
						
						else
						{
							if(!empty($file_name))
							{
									
								if ($file_size >1048567) 
								{
									 echo "<span class='error'>Image Size should be less then 1MB!
									 </span>";
								} 
								elseif (in_array($file_ext, $permited) === false) 
								{
									 echo "<span class='error'>You can upload only:-"
									 .implode(', ', $permited)."</span>";
								} 
								else
								{	
									move_uploaded_file($file_temp, $uploaded_image);
									$query = "UPDATE tbl_slider 
											  SET 
											  title = '$title',
											  image = '$uploaded_image'
											  WHERE id = '$sliderid'";
									
									$updated_rows = $db->update($query);
									if ($updated_rows) 
									{
										echo "<span class='success'>Slider Updated Successfully.
										</span>";
									}
									else 
									{
										echo "<span class='error'>Slider Not Updated !!</span>";
									}
								}
							}
							else
							{
								$query = "UPDATE tbl_slider 
											  SET 
											  title = '$title'
											  WHERE id = '$sliderid'";
									
									$updated_rows = $db->update($query);
									if ($updated_rows) 
									{
										echo "<span class='success'>Slider Updated Successfully.
										</span>";
									}
									else 
									{
										echo "<span class='error'>Slider Not Updated !!</span>";
									}
							}
						}
					}
				?>
				
                <div class="block"> 
				 <?php
					$query1 = "select * from tbl_slider where id='$sliderid'";
					$getslider = $db->select($query1);
					if($getslider)
					{
						while($sliderresult = $getslider->fetch_assoc())
						{
			   ?>
                 <form action="" method="post" enctype="multipart/form-data" class="editSldForm" />
                    <table class="form">
                       
                        <tr>
                            <td width="20%">
                                <label>Edit Title:</label>
                            </td>
                            <td width="80%">
                                <input type="text" name="title" value="<?php echo $sliderresult['title']; ?>" class="medium" />
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Edit Image:</label>
                            </td>
                            <td>
								<img src="<?php echo $sliderresult['image'];?>" height="130px" width="300px"/><br/>
                                <input type="file" name="image" class="medium"/>
                            </td>
                        </tr>
						
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" class="btnSubmit"/>
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


 
