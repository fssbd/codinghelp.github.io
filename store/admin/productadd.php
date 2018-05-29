<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">       
        
<?php

	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$bookId=$_POST['bookId'];
		/*$bookName=$_POST['bookName'];*/
		$catId=$_POST['catId'];
		/*$catName=$_POST['catName'];*/
		$branchId=$_POST['branchId'];
		/*$branchName=$_POST['branchName'];*/
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
		
		
		if(!empty($bookId))
		{
			if(!empty($catId))
			{
				if(!empty($branchId))
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
									$query="insert into tbl_product (bookId,bookName,authorName,catId,catName,branchId,branchName,price,image) 
									values(
									'$bookId',
									(select bookName from tbl_books where bookId='$bookId'),
									(select authorName from tbl_books where bookId='$bookId'),
									'$catId',
									(select catName from tbl_category where catId='$catId'),
									'$branchId',
									(select branchName from tbl_branch where branchId='$branchId'),
									'$price',
									'$uploaded_image')";
									
									$productInsert=$db->insert($query);
									if($productInsert)
									{
										echo "<span style='color:green;font-size:18px;'>Product Inserted Successfully.</span>"; 
									}
									else
									{
										echo "<span style='color:red;font-size:18px;'>Product Not Inserted !</span>";
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
					echo "<span style='color:red;font-size:18px;'>Brand Name Field must not be empty</span>";
				}
			}
			else
			{
				echo "<span style='color:red;font-size:18px;'>Category Name Field must not be empty</span>";
			}
		}
		else
	    {
			echo "<span style='color:red;font-size:18px;'>Product Name Field must not be empty</span>";
	    }
	}
?> 

        
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <!--Product Name-->
                <tr>
                    <td>
                        <label>Product Name</label>
                    </td>
                    <td>
                        <select id="select" name="bookId">
                            <option>Select Product</option>
                        <?php
                            $query="select * from tbl_books";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                while($result=$selectData->fetch_assoc())
                                {

                        ?>
                            <option value="<?php echo $result['bookId']; ?>"><?php echo $result['bookName']; ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                
                <!--Product Category-->
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
                            <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
                        <?php
                                }
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                
                <!--Product Branch-->
                <tr>
                    <td>
                        <label>Branch</label>
                    </td>
                    <td>
                        <select id="select" name="branchId">
                            <option>Select Branch</option>
                        <?php
                            $query="select * from tbl_branch";
                            $selectData=$db->select($query);
                            if($selectData)
                            {
                                while($result=$selectData->fetch_assoc())
                                {

                        ?>
                            <option value="<?php echo $result['branchId']; ?>"><?php echo $result['branchName']; ?></option>
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


