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

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
			   <?php
				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					if($role == '0')
					{
						$name = $_POST['name']; 
						$name = mysqli_real_escape_string($db->link1, $name);
						
						if(empty($name))
						{
							echo "<span class='error'>Field must not be empty!!</span>";
						}
						else
						{
							$query = "insert into tbl_category(name) values('$name')";
							$catinsert = $db->insert($query);
							if($catinsert)
							{
								echo "<span class='success'>Category Inserted Seccessfully !!</span>";
							}
							else
							{
								echo "<span class='error'>Category Not Inserted !!</span>";
							}
						}
					}
					else
					{
						echo "<span class='error'>Error!! Only Admin Can Add Category.</span>";
					}
					
				}
			   ?>
                 <form action="" method="post" class="catForm">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" class="btnSubmit"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include "inc/footer.php"; ?>