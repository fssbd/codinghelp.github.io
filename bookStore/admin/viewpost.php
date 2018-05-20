<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
	if(!isset($_GET['viewpostid']) || $_GET['viewpostid'] == NULL)
	{
		echo "<script>window.location = 'postlist.php'; </script>";
	}
	else
	{
		$postid = $_GET['viewpostid'];
	}
?>

<style type="text/css">
	.addPostForm{
		width: 80%;
		border: 1px solid #315C7C;
		padding: 20px 30px;
		border-radius: 5px;
		margin: 7px auto;
	}
	input.medium {
		width: 98.6% !important;
		height:22px;
	}
	
	.btnSubmit{
		margin-top:10px;
	}
</style>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Post</h2>
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						echo "<script>window.location = 'postlist.php'; </script>";
					}
				?>
				
                <div class="block"> 
				 <?php
					$query1 = "select * from tbl_post where id='$postid' order by id desc";
					$getpost = $db->select($query1);
					
					while($postresult = $getpost->fetch_assoc())
					{
			   ?>
                 <form action="" method="post" enctype="multipart/form-data" class="addPostForm">
                    <table class="form">
                       
                        <tr>
                            <td width="20%">
                                <label>Title:</label>
                            </td>
                            <td width="80%">
                                <input type="text" readonly value="<?php echo $postresult['title']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category:</label>
                            </td>
                            <td>
                                <select id="select" readonly name="cat">
									<option>Select Category</option>
								<?php
									$query = "select * from tbl_category";
									$category = $db->select($query);
									
									if($category)
									{
										while($result = $category->fetch_assoc())
										{
											
								?>

                                <option 
								<?php
									if($postresult['cat'] == $result['id']){ ?>
									selected = "selected"
										<?php } ?>
								
								value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
								
                             <?php 	} }?>
                                </select>
                            </td>
                        </tr>
                   
                   
                        <tr>
                            <td>
                                <label>Image:</label>
                            </td>
                            <td>
								<img src="<?php echo $postresult['image'];?>" height="140px" width="250px"/>
                               
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content:</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
									<?php echo $postresult['body']; ?>
								</textarea>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Tags:</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $postresult['tags'];?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Author:</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $postresult['author'];?>" class="medium" />
                            </td>
                        </tr>
						
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" class="btnSubmit"/>
                            </td>
                        </tr>
                    </table>
                    </form>
					<?php } ?>
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
		
<?php include "inc/footer.php"; ?>


 
