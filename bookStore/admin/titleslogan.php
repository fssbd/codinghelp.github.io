<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<style>
	.leftside{
		float: left;
		width: 64%;
		border: 1px solid #315C7C;
		margin-right: 60px;
		margin-left: 13px;
		padding: 20px 30px;
		border-radius: 5px;
		margin-top: 70px;
	}
	.rightside{
		float:left;
		width:20%;
		margin-top: 70px;
	}
	.rightside h2 {
		  background: #f6f6f6 none repeat scroll 0 0;
		  font-size: 18px;
		  margin-top: 4px;
		  text-align: center;
	}
	.rightside img {
		  height: 145px;
		  margin-left: 28px;
		  width: 150px;
		  margin-top: 15px;
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
                <h2>Update Site Title and Description</h2>
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						
						if($role == '0' || $role == '2')
						{
							$title = $fm->validation($_POST['title']);
							$slogan = $fm->validation($_POST['slogan']);
							
							$title  = mysqli_real_escape_string($db->link1, $title);
							$slogan    = mysqli_real_escape_string($db->link1, $slogan);
							
							$permited  = array('png');
							$file_name = $_FILES['logo']['name'];
							$file_size = $_FILES['logo']['size'];
							$file_temp = $_FILES['logo']['tmp_name'];

							$div = explode('.', $file_name);
							$file_ext = strtolower(end($div));
							$same_image = 'logo'.'.'.$file_ext;
							$uploaded_image = "upload/".$same_image;
			
							if($title == "" || $slogan == "")
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
										$query = "UPDATE tbl_title_slogan 
												  SET 
												  title  = '$title',
												  slogan = '$slogan',
												  logo   = '$uploaded_image'
												  WHERE id = '1'";
										
										$updated_rows = $db->update($query);
										if ($updated_rows) 
										{
											echo "<span class='success'>Data Updated Successfully.
											</span>";
										}
										else 
										{
											echo "<span class='error'>Data Not Updated !!</span>";
										}
									}
								}
								else
								{
									$query = "UPDATE tbl_title_slogan 
												  SET 
												  title  = '$title',
												  slogan = '$slogan'
												  WHERE id = '1'";
										
										$updated_rows = $db->update($query);
										if ($updated_rows) 
										{
											echo "<span class='success'>Data Updated Successfully.
											</span>";
										}
										else 
										{
											echo "<span class='error'>Data Not Updated !!</span>";
										}
								}
							}
						}
						else
						{
							echo "<span class='error'>Error!! Only Admin and Editor Can Update Title and Slogan.</span>";
						}
						
						
					}
?>

				
				<?php
					$query = "select * from tbl_title_slogan where id = '1'";
					$getData = $db->select($query);
					if($getData)
					{
						while($result = $getData->fetch_assoc()) 
						{
				?>
				
                <div class="block sloginblock"> 
					<div class="leftside">
						<form action="" method="post" enctype="multipart/form-data">
							<table class="form">					
								<tr>
									<td>
										<label>Website Title:</label>
									</td>
									<td>
										<input type="text" value="<?php echo $result['title'];?>" name="title" class="medium" />
									</td>
								</tr>
								 <tr>
									<td>
										<label>Website Slogan:</label>
									</td>
									<td>
										<input type="text" value= "<?php echo $result['slogan'];?>" name="slogan" class="medium" />
									</td>
								</tr>
								
								 <tr>
									<td>
										<label>Upload Logo:</label>
									</td>
									<td>
										<input type="file" name="logo" class="medium"/>
									</td>
								</tr>
								
								 <tr>
									<td>
									</td>
									<td>
										<input type="submit" name="submit" Value="Update" class="btnSubmit"/>
									</td>
								</tr>
							</table>
						</form>
					</div>
					<div class="rightside">
						<h2>Website Logo</h2>
						<img src="<?php echo $result['logo'];?>" alt="logo"/>
						
					</div>
                </div>
				<?php } } ?>
            </div>
        </div>
<?php include "inc/footer.php"; ?>
