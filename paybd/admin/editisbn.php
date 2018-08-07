<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit ISBN Code of Book</h2>
        <div class="block">       


<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:isbnlist.php");
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
		$isbnCode=$_POST['isbnCode'];
		
		
		if(!empty($bookId))
		{
			if(!empty($isbnCode))
			{
				$query="update tbl_isbn 
				set isbnCode='$isbnCode',
				bookId='$bookId',
				bookName=(select bookName from tbl_books where bookId='$bookId') where isbnId='$editid'";

				$updateData=$db->update($query);
				if($updateData)
				{
					echo "<span style='color:green;font-size:18px;'>Edited Successfully.</span>"; 
				}
				else
				{
					echo "<span style='color:red;font-size:18px;'>Update Failed!</span>";
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

        <?php
			$query="select * from tbl_isbn where isbnId='$editid' order by isbnId desc";
			$getData=$db->select($query);
			while($dataResult=$getData->fetch_assoc())
			{

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
                            <option 
                            <?php
								if($dataResult['bookId']==$result['bookId']) { ?>
									selected="selected"
							<?php } ?> value="<?php echo $result['bookId']; ?>"><?php echo $result['bookName']; ?></option>
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
                        <input type="text" value="<?php echo $dataResult['isbnCode']; ?>" name="isbnCode" class="medium" />
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


