﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Branches of Book</h2>
        <div class="block">       
        
<?php

	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$bookId=$_POST['bookId'];
		/*$bookName=$_POST['bookName'];*/
		
		$branchId=$_POST['branchId'];
		/*$branchName=$_POST['branchName'];*/
		
		$qty=$_POST['qty'];
		
		
		
		if(!empty($bookId))
		{
			if(!empty($branchId))
			{
				if(!empty($qty))
				{
					$query="insert into tbl_product (bookId,bookName,authorName,catId,catName,branchId,branchName,price,image,qty) 
					values(
					'$bookId',
					(select bookName from tbl_books where bookId='$bookId'),
					(select authorName from tbl_books where bookId='$bookId'),
					(select catId from tbl_books where bookId='$bookId'),
					(select catName from tbl_books where bookId='$bookId'),
					'$branchId',
					(select branchName from tbl_branch where branchId='$branchId'),
					(select price from tbl_books where bookId='$bookId'),
					(select image from tbl_books where bookId='$bookId'),
					'$qty')";

					$productInsert=$db->insert($query);
					if($productInsert)
					{
						echo "<span style='color:green;font-size:18px;'>Insertion Successful.</span>"; 
					}
					else
					{
						echo "<span style='color:red;font-size:18px;'>Insertion Failed!</span>";
					}
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>Qty Field must not be empty.</span>";
				}
			}
			else
			{
				echo "<span style='color:red;font-size:18px;'>Branch Field must not be empty.</span>";
			}
		}
		else
	    {
			echo "<span style='color:red;font-size:18px;'>Book Name Field must not be empty.</span>";
	    }
	}
?> 

        
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <!--Product Name-->
                <tr>
                    <td>
                        <label>Book Name</label>
                    </td>
                    <td>
                        <select id="select" name="bookId">
                            <option value="">Select Book</option>
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
                            <option value="">Select Branch</option>
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
                        <label>Qty</label>
                    </td>
                    <td>
                        <input type="number" name="qty" value="0" placeholder="Enter Qty..."  />
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


