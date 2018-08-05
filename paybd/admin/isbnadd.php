<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add ISBN Code of Book</h2>
        <div class="block">       
        
<?php

	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$bookId=$_POST['bookId'];
		$isbnCode=$_POST['isbnCode'];
		
		
		if(!empty($bookId))
		{
			if(!empty($isbnCode))
			{
				$query="insert into tbl_isbn (isbnCode,bookId,bookName) 
				values(
                '$isbnCode',
				'$bookId',
				(select bookName from tbl_books where bookId='$bookId')) ";

				$ISBNInsert=$db->insert($query);
				if($ISBNInsert)
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
				echo "<span style='color:red;font-size:18px;'>ISBN Code Field must not be empty.</span>";
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
                
                <tr>
                    <td>
                        <label>ISBN Code</label>
                    </td>
                    <td>
                        <input type="text" name="isbnCode" placeholder="Enter ISBN Code..." class="medium" />
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


