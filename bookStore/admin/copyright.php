<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<style type="text/css">
	.copyrtForm{
		width: 70%;
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
                <h2>Update Copyright Text</h2>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
	
						if($role == '0' || $role == '2')
						{
							$note = $fm->validation($_POST['note']);
						
							$note    = mysqli_real_escape_string($db->link1, $note);
							
							if($note == "")
							{
								echo "<span class='error'>Field must not be empty !!</span>";
							}
							
							else
							{
								$query = "UPDATE tbl_footer 
											SET 
											note  = '$note'
											WHERE id = '1'";
										
								$updated_rows = $db->update($query);
								if ($updated_rows) 
								{
									echo "<span class='success'>Data Updated Successfully.</span>";
								}
								else 
								{
									echo "<span class='error'>Data Not Updated !!</span>";
								}
							}
						}
						
						else
						{
							echo "<span class='error'>Error!! Only Admin and Editor Can Update Copyright.</span>";
						}
						
						
						
					}
				?>
                <div class="block copyblock"> 
				<?php
					$query = "select * from tbl_footer where id = '1'";
					$footer = $db->select($query);
					if($footer)
					{
						while($result = $footer->fetch_assoc()) 
						{
				?>
                <form action="copyright.php" method="post" class="copyrtForm">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['note'];?>" name="note" class="medium" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" class="btnSubmit"/>
                            </td>
                        </tr>
                    </table>
                </form>
				<?php } } ?>
                </div>
            </div>
        </div> 
<?php include "inc/footer.php"; ?>
