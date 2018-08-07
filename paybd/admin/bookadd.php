<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Book</h2>
        <div class="block">       
        
<?php

	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$bookName=$_POST['bookName'];
		$authorName=$_POST['authorName'];
		$catId=$_POST['catId'];
		$price=$_POST['price'];
		
		/*$bookName=mysqli_real_escape_string($db->link,$bookName);*/
		
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_temp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "upload/".$unique_image;
		
		
		if(!empty($bookName))
		{
			if(!empty($catId))
			{
				if(!empty($price))
				{
					if(!empty($file_name))
					{
						if($file_size <1048567)
						{
							if(in_array($file_ext, $permited) === true)
							{
								move_uploaded_file($file_temp, $uploaded_image);
								$query="insert into tbl_books (bookName,authorName,catId,catName,price,image) 
								values(
								'$bookName',
								'$authorName',
								'$catId',
								(select catName from tbl_category where catId='$catId'),
								'$price',
								'$uploaded_image')";

								$BookInsert=$db->insert($query);
								if($BookInsert)
								{
									echo "<span style='color:green;font-size:18px;'>Book Inserted Successfully.</span>"; 
								}
								else
								{
									echo "<span style='color:red;font-size:18px;'>Book Not Inserted !</span>";
								}
							}
							else
							{
								echo "<span style='color:green;font-size:18px;'>You can upload only:-".implode(', ', $permited)."</span>";
							}
						}
						else
						{
							echo "<span style='color:green;font-size:18px;'>Image Size should be less then 1MB!</span>";
						}
					}
					else
					{
						echo "<span style='color:red;font-size:18px;'>Image must not be empty</span>";
					}
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>Price Field must not be empty</span>";
				}
				
			}
			else
			{
				echo "<span style='color:red;font-size:18px;'>Category Field must not be empty</span>";
			}
		}
		else
	    {
			echo "<span style='color:red;font-size:18px;'>Book Name Field must not be empty</span>";
	    }
	}
?> 

        
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                				
                <tr>
                    <td>
                        <label>Book Name</label>
                    </td>
                    <td>
                        <input type="text" name="bookName" placeholder="Book Name.." class="medium" />
                    </td>
                </tr>
                				
                <tr>
                    <td>
                        <label>Author Name</label>
                    </td>
                    <td>
                        <input type="text" name="authorName" placeholder="Author Name.." class="medium" />
                    </td>
                </tr>
                
                <!--Book Category-->
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option value="">Select Category</option>
                        <?php
                            $query="select * from tbl_category";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                while($result=$selectData->fetch_assoc())
                                {

                        ?>
                            <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
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
<?php include 'inc/footer.php';?>


