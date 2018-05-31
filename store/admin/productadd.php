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
		
		$branchId=$_POST['branchId'];
		/*$branchName=$_POST['branchName'];*/
		
		
		
		if(!empty($bookId))
		{
			if(!empty($branchId))
			{
				$query="insert into tbl_product (bookId,bookName,authorName,catId,catName,branchId,branchName,price,image) 
				values(
				'$bookId',
				(select bookName from tbl_books where bookId='$bookId'),
				(select authorName from tbl_books where bookId='$bookId'),
				(select catId from tbl_books where bookId='$bookId'),
				(select catName from tbl_books where bookId='$bookId'),
				'$branchId',
				(select branchName from tbl_branch where branchId='$branchId'),
				(select price from tbl_books where bookId='$bookId'),
				(select image from tbl_books where bookId='$bookId'))";

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
				echo "<span style='color:red;font-size:18px;'>Branch Name Field must not be empty</span>";
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


