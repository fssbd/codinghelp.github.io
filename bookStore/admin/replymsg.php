<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<?php
	if(!isset($_GET['msgid']) || ($_GET['msgid'] == NULL))
	{
		echo "<script>window.location = 'inbox.php'; </script>";
	}
	else
	{
		$id = $_GET['msgid'];
	}
?>

<style type="text/css">
	.mszForm{
		width: 80%;
		border: 1px solid #315C7C;
		padding: 20px 30px;
		border-radius: 5px;
		margin: 20px auto;
	}
	input.medium {
		width: 98.6%;
		height:22px;
	}
	
	.btnSubmit{
		margin-top:10px;
	}
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$to      = $fm->validation($_POST['toemail']);
						$from    = $fm->validation($_POST['fromemail']);
						$subject = $fm->validation($_POST['subject']);
						$message = mysqli_real_escape_string($_POST['message']);
						$sendmail = mail($to, $subject, $message, $from);
						
						if($sendmail)
						{
							echo "<span class='success'>Message Sent Successfully !!</span>";
						}
						else
						{
							echo "<span class='error'>ERROR!! Something went wrong.</span>";
						}
					}
				?>
				
                <div class="block">               
                 <form action="" method="post" class="mszForm">
				 <?php
					$query = "select * from tbl_contact where id='$id'";
					$msg = $db->select($query);
							
					if($msg)
					{
						while($result = $msg->fetch_assoc())
						{
				?>
				 
                    <table class="form">
						
						<tr>
                            <td width="20%">
                                <label>To:</label>
                            </td>
                            <td width="80%">
                                <input type="text" readonly name="toemail" value="<?php echo $result['email']; ?>" 
								class="medium" />
                            </td>
                        </tr>
                     
						<tr>
                            <td>
                                <label>From:</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail" placeholder="Please Enter Your Email Address" class="medium" />
                            </td>
                        </tr>
                  
						<tr>
                            <td>
                                <label>Subject:</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="Please Enter Your Subject" class="medium" />
                            </td> 
                        </tr>
				  
                        <tr>
                            <td>
                                <label>Message:</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message">
									
								</textarea>
                            </td>
                        </tr>
						
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" class="btnSubmit"/>
                            </td>
                        </tr>
                    </table>
					
					<?php } } ?>
					
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


 
