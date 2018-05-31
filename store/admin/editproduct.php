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
		$branchId=$_POST['branchId'];
		
		if(!empty($bookId))
		{
			if(!empty($branchId))
			{
				$query="update tbl_product 
				set bookId='$bookId',
				bookName=(select bookName from tbl_books where bookId='$bookId'),
				authorName=(select authorName from tbl_books where bookId='$bookId'),
				catId=(select catId from tbl_books where bookId='$bookId'),
				catName=(select catName from tbl_books where bookId='$bookId'),
				branchId='$branchId',
				branchName=(select branchName from tbl_branch where branchId='$branchId'),
				price=(select price from tbl_books where bookId='$bookId'),
				image=(select image from tbl_books where bookId='$bookId') 
				where productId='$editid' ";
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
				echo "<span style='color:red;font-size:18px;'>Branch Name Field must not be empty</span>";
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


