<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
	if(!isset($_GET['userid']) || ($_GET['userid'] == NULL))
	{
		echo "<script>window.location = 'userlist.php'; </script>";
	}
	else
	{
		$id = $_GET['userid'];
	}
?>

<style type="text/css">
	.userForm{
		width: 80%;
		border: 1px solid #315C7C;
		padding: 20px 30px;
		border-radius: 5px;
		margin: 20px auto;
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
                <h2>User Details</h2>
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						echo "<script>window.location = 'userlist.php'; </script>";
					}
				?>
				
                <div class="block"> 
				 <?php
					$query1 = "select * from tbl_user where id='$id'";
					$getuser = $db->select($query1);
					if($getuser)
					{
						while($result = $getuser->fetch_assoc())
						{
			   ?>
                 <form action="" method="post" class="userForm">
                    <table class="form">
                       
                        <tr>
                            <td width="20%">
                                <label>Name:</label>
                            </td>
                            <td width="80%">
                                <input type="text" readonly name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                
						<tr>
                            <td>
                                <label>Username:</label>
                            </td>
                            <td>
                                <input type="text" readonly name="username" value="<?php echo $result['username'];?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Email:</label>
                            </td>
                            <td>
                                <input type="email" readonly name="email" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
						
						<tr>
							<td>
                                <label>Details:</label>
                            </td>
							<td>
								<textarea class="tinymce" name="details">
									<?php echo $result['details'];?>
								</textarea>
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
					<?php } } ?>
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


 
