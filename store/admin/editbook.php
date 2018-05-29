<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
	if(!isset($_GET['editid']) || $_GET['editid']==NULL)
	{
		header("Location:booklist.php");
	}
	else
	{
		$id=$_GET['editid'];
	}


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Book</h2>
        <div class="block"> 
		<?php


			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$bookName=$_POST['bookName'];
				$bookName=mysqli_real_escape_string($db->link,$bookName);
				$authorName=$_POST['authorName'];
				$authorName=mysqli_real_escape_string($db->link,$authorName);
				if(!empty($bookName))
				{
					if(!empty($authorName))
					{
						$query="Update tbl_books set bookName='$bookName',authorName='$authorName' where bookId='$id'";
						$bookUpdate=$db->update($query);
						if($bookUpdate)
						{
							echo "<span style='color:green;font-size:18px;'>Book Updateed Successfully.</span>";
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>Book Not Updateed !</span>";
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
			$query="select * from tbl_books where bookId='$id' order by bookId desc";
			$bookh=$db->select($query);
			while($result=$bookh->fetch_assoc())
			{

		?>              
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Book Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['bookName']; ?>" name="bookName" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Author Namen</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['authorName']; ?>" name="authorName" class="medium" />
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
<?php include 'inc/footer.php';?>