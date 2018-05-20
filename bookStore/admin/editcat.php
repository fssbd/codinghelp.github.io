<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>


<style type="text/css">
	.catForm{
		width: 50%;
		border: 1px solid #315C7C;
		padding: 20px 30px;
		border-radius: 5px;
		margin: 100px auto;
	}
	
	input.medium {
		width: 98%;
		height:22px;
	}
	
	.btnSubmit{
		margin-top:10px;
	}
</style>

<?php
	if(!isset($_GET['catid']) || ($_GET['catid'] == NULL))
	{
		echo "<script>window.location = 'catlist.php'; </script>";
	}
	else
	{
		$id = $_GET['catid'];
	}
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock"> 
			   <?php
				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					$name = $_POST['name']; 
					$name = mysqli_real_escape_string($db->link1, $name);
					
					if(empty($name))
					{
						echo "<span class='error'>Field must not be empty!!</span>";
					}
					else
					{
						$query = "UPDATE tbl_category SET name='$name' WHERE id='$id'";
						$update_row = $db->update($query);
						if($update_row)
						{
							echo "<span class='success'>Category Updated Seccessfully !!</span>";
						}
						else
						{
							echo "<span class='error'>Category Not Updated !!</span>";
						}
					}
				}
			   ?>
			   <?php
					$query1 = "select * from tbl_category where id='$id' order by id desc";
					$category = $db->select($query1);
					if($category)
					{
						while($result = $category->fetch_assoc())
						{
			   ?>
                <form action="" method="post" class="catForm">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" class="btnSubmit"/>
                            </td>
                        </tr>
                    </table>
                </form>
				
				<?php } } ?>
				
                </div>
            </div>
        </div>
<?php include "inc/footer.php"; ?>