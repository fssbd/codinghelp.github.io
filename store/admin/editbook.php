<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Book</h2>
        <div class="block">       




<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:booklist.php");
	}
	else
	{
		$editid=$_GET['editid'];
	}


?>

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
			if(!empty($authorName))
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
									$query="update tbl_books 
									set bookName='$bookName',
									authorName='$authorName',
									catId='$catId',
									catName=(select catName from tbl_category where catId='$catId'),
									price='$price',
									image='$uploaded_image' where bookId='$editid' ";
									$productUpdate=$db->update($query);
									if($productUpdate)
									{
										echo "<span style='color:green;font-size:18px;'>Book Update Successfully.</span>"; 
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
						else{
							$query="update tbl_books 
							set bookName='$bookName',
							authorName='$authorName',
							catId='$catId',
							catName=(select catName from tbl_category where catId='$catId'),
							price='$price' where bookId='$editid' ";
							$bookUpdate=$db->update($query);
							if($bookUpdate)
							{
								echo "<span style='color:green;font-size:18px;'>Book Update Successfully.</span>"; 
							}
						}
					}
					else
					{
						echo "<span style='color:red;font-size:18px;'>Price Field must not be empty</span>";
					}
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>Category Name Field must not be empty</span>";
				}
			}
			else
			{
				echo "<span style='color:red;font-size:18px;'>Author Name Field must not be empty</span>";
			}
		}
		else
	    {
			echo "<span style='color:red;font-size:18px;'>Book Name Field must not be empty</span>";
	    }
	}
?> 

        <?php
			$query="select * from tbl_books where bookId='$editid' order by bookId desc";
			$getBookData=$db->select($query);
			while($bookResult=$getBookData->fetch_assoc())
			{

		?> 
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <!--Book Name-->
                <tr>
                    <td>
                        <label>Book Name</label>
                    </td>
                    <td>
                        <input type="text" name="bookName" value="<?php echo $bookResult['bookName']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Author Name</label>
                    </td>
                    <td>
                        <input type="text" name="authorName" value="<?php echo $bookResult['authorName']; ?>" class="medium" />
                    </td>
                </tr>
                
                <!--Book Category-->
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                        <?php
                            $query="select * from tbl_category";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                while($result=$selectData->fetch_assoc())
                                {

                        ?>
                            <option 
                            <?php
								if($bookResult['catId']==$result['catId']) { ?>
									selected="selected"
							<?php } ?> value="<?php echo $bookResult['catId']; ?>"><?php echo $result['catName']; ?></option>
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
                        <input type="text" value="<?php echo $bookResult['price']?>" name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                       <img src="<?php echo $bookResult['image']?>" height="70px" width="50px" alt="">
                       <br/>
                        <input name="image" type="file" />
                    </td>
                </tr>

				<tr>
                    <td></td>
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


