<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<style type="text/css">
	.themeForm{
		width: 50%;
		border: 1px solid #315C7C;
		padding: 30px;
		border-radius: 5px;
		margin: 50px auto;
	}

	
	.btnSubmit{
		margin-top:10px;
	}
</style>


     <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Select Theme</h2>
               <div class="block copyblock"> 
			   <?php
				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					$theme = mysqli_real_escape_string($db->link1, $_POST['theme']);
					
					$query = "UPDATE tbl_theme SET theme='$theme' WHERE id='1'";
					$update_row = $db->update($query);
					if($update_row)
					{
						echo "<span class='success'>Theme Updated Seccessfully !!</span>";
					}
					else
					{
						echo "<span class='error'>Theme Not Updated !!</span>";
					}
					
				}
			   ?>
			   <?php
					$query1 = "select * from tbl_theme where id='1'";
					$themes = $db->select($query1);
					if($themes)
					{
						while($result = $themes->fetch_assoc())
						{
			   ?>
                <form action="" method="post" class="themeForm">
                    <table class="form">					
                        <tr>
                            <td>
                                <input <?php if($result['theme'] == 'default'){
									echo "checked"; }?> type="radio" name="theme" value="default"/>Default
                            </td>
						</tr>
						<tr>
							 <td>
                                <input <?php if($result['theme'] == 'green'){
									echo "checked"; }?> type="radio" name="theme" value="green"/>Green
                            </td>
						</tr>
						<tr>
							 <td>
                                <input <?php if($result['theme'] == 'blue'){
									echo "checked"; }?> type="radio" name="theme" value="blue"/>Blue
                            </td>
					    </tr>
						<tr>
							 <td>
                                <input <?php if($result['theme'] == 'gray'){
									echo "checked"; }?> type="radio" name="theme" value="gray"/>Gray
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change" class="btnSubmit"/>
                            </td>
                        </tr>
                    </table>
                </form>
				
				<?php } } ?>
				
                </div>
            </div>
        </div>
<?php include "inc/footer.php"; ?>