<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
				$query="insert into tbl_books (bookName,authorName) values('$bookName','$authorName')";
				$bookinsert=$db->insert($query);
				if($bookinsert)
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
				echo "<span style='color:red;font-size:18px;'>Author Name Field must not be empty</span>";
			}
		}
		else
	    {
			echo "<span style='color:red;font-size:18px;'>Book Name Field must not be empty</span>";
	    }
	}
?>              
         <form action="" method="post">
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
<?php include 'inc/footer.php';?>