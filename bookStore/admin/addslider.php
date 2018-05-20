<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
 
<style type="text/css">
	.sliderForm{
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
 
 
 <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Slider</h2>
				
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
						$uploaded_image = "upload/slider/".$unique_image;
		
						if($title == "" || $file_name == "")
						{
							echo "<span class='error'>Field must not be empty !!</span>";
						}
						elseif ($file_size >1048567) 
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
							$query = "INSERT INTO tbl_slider(title, image) 
							VALUES('$title', '$uploaded_image')";
							
							$inserted_rows = $db->insert($query);
							if ($inserted_rows) 
							{
								echo "<span class='success'>Slider Inserted Successfully.
								</span>";
							}
							else 
							{
								echo "<span class='error'>Slider Not Inserted !!</span>";
							}
						}
					}
				?>
				
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data" class="sliderForm">
                    <table class="form">
                       
                        <tr>
                            <td width="27%">
                                <label>Slider Title:</label>
                            </td>
                            <td width="73%">
                                <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
                            </td>
                        </tr>      
                   
                        <tr>
                            <td>
                                <label>Upload Slider Image:</label>
                            </td>
                            <td>
                                <input type="file" name="image" class="medium"/>
                            </td>
                        </tr>
                     
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" class="btnSubmit"/>
                            </td>
                        </tr>
                    </table>
                    </form>
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


 
