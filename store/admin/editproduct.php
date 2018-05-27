<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block">       




<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:productlist.php");
	}
	else
	{
		$editid=$_GET['editid'];
	}


?>

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
									$query="update tbl_product 
									set bookId='$bookId',
									bookName=(select bookName from tbl_books where bookId='$bookId'),
									authorName=(select authorName from tbl_books where bookId='$bookId'),
									catId='$catId',
									catName=(select catName from tbl_category where catId='$catId'),
									branchId='$branchId',
									branchName=(select branchName from tbl_branch where branchId='$branchId'),
									price='$price',
									image='$uploaded_image' where productId='$editid' ";
									$productUpdate=$db->update($query);
									if($productUpdate)
									{
										echo "<span style='color:green;font-size:18px;'>Product Update Successfully.</span>"; 
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
						else{
							$query="update tbl_product 
							set bookId='$bookId',
							bookName=(select bookName from tbl_books where bookId='$bookId'),
							authorName=(select authorName from tbl_books where bookId='$bookId'),
							catId='$catId',
							catName=(select catName from tbl_category where catId='$catId'),
							branchId='$branchId',
							branchName=(select branchName from tbl_branch where branchId='$branchId'),
							price='$price' where productId='$editid' ";
							$productUpdate=$db->update($query);
							if($productUpdate)
							{
								echo "<span style='color:green;font-size:18px;'>Product Update Successfully.</span>"; 
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

        <?php
			$query="select * from tbl_product where productId='$editid' order by productId desc";
			$getProductData=$db->select($query);
			while($productResult=$getProductData->fetch_assoc())
			{

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
                            <option 
                            <?php
								if($productResult['bookId']==$result['bookId']) { ?>
									selected="selected"
							<?php } ?> value="<?php echo $result['bookId']; ?>"><?php echo $result['bookName']; ?></option>
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
                            <option 
                            <?php
								if($productResult['catId']==$result['catId']) { ?>
									selected="selected"
							<?php } ?> value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
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
                            <option 
                            <?php
								if($productResult['branchId']==$result['branchId']) { ?>
									selected="selected"
							<?php } ?> value="<?php echo $result['branchId']; ?>"><?php echo $result['branchName']; ?></option>
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
                        <input type="text" value="<?php echo $productResult['price']?>" name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                       <img src="<?php echo $productResult['image']?>" height="70px" width="50px" alt="">
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


