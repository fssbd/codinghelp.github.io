<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<style type="text/css">
	.addPageForm{
		width: 80%;
		border: 1px solid #315C7C;
		padding: 20px 30px;
		border-radius: 5px;
		margin: 7px auto;
	}
	input.medium {
		width: 97.2%;
		height:22px;
	}
	
	.btnSubmit{
		margin-top:10px;
	}
</style>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						if($role == '0')
						{
							$name  = mysqli_real_escape_string($db->link1, $_POST['name']);
							$body   = mysqli_real_escape_string($db->link1, $_POST['body']);
							
			
							if($name == ""|| $body == "")
							{
								echo "<span class='error'>Field must not be empty !!</span>";
							} 
							else
							{
								$query = "INSERT INTO tbl_page(name, body) 
								VALUES('$name', '$body')";
								
								$inserted_rows = $db->insert($query);
								if ($inserted_rows) 
								{
									echo "<span class='success'>Page Created Successfully.
									</span>";
								}
								else 
								{
									echo "<span class='error'>Page Not Created !!</span>";
								}
							}
						}
	
						else
						{
							echo "<span class='error'>Error!! Only Admin Can Create Page.</span>";
						}	
						
					}
				?>
				
                <div class="block">               
                 <form action="addpage.php" method="post" class="addPageForm">
                    <table class="form">
                       
                        <tr>
                            <td width="13%">
                                <label>Name:</label>
                            </td>
                            <td width="87%">
                                <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                  
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content:</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
						
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" class="btnSubmit"/>
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
		
<?php include "inc/footer.php"; ?>


 
