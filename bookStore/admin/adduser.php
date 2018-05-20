<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
	if($role != '0') 
	{
		echo "<script>window.location = 'index.php'; </script>";
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
		width: 98.7%;
		height:22px;
	}
	
	.medium {
		width: 100.1%;
		height:33px;
	}
	
	.btnSubmit{
		margin-top:10px;
	}
</style>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
			   <?php
				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					$name = $fm->validation($_POST['name']);
					$password = $fm->validation(md5($_POST['password']));
					$email     = $fm->validation($_POST['email']);
					$role     = $fm->validation($_POST['role']);
					$details     = $fm->validation($_POST['details']);

					
					
					$name = mysqli_real_escape_string($db->link1, $name);
					$password = mysqli_real_escape_string($db->link1, $password);
					$email 	  = mysqli_real_escape_string($db->link1, $email);
					$role 	  = mysqli_real_escape_string($db->link1, $role);
					$details 	  = mysqli_real_escape_string($db->link1, $details);
					
					
					if(empty($name) || empty($password) || empty($email) || empty($role) || empty($details))
					{
						echo "<span class='error'>Field must not be empty!!</span>";
					}
					else
					{
						if($role==0)
						{
							$username='admin';
						}
						elseif($role==1)
						{
							$username='author';
						}
						elseif($role==2)
						{
							$username='editor';
						}
											
						$mailquery = "select * from tbl_user where email = '$email' limit 1";
						$mailCheck = $db->select($mailquery);
						
						if($mailCheck != false)
						{
							echo "<span class='error'>ERROR!! Email Already Exist.</span>";
						}
						
						else
						{
							$query = "insert into tbl_user(name, username, password, email, role, details) values('$name','$username','$password', '$email', '$role', '$details')";
							$catinsert = $db->insert($query);
							if($catinsert)
							{
								echo "<span class='success'>User Created Successfully !!</span>";
							}
							else
							{
								echo "<span class='error'>ERROR!! User Not Created.</span>";
							}
						}
					}
				}
			   ?>
                 <form action="" method="post" class="userForm">
                    <table class="form">					
                        <tr>
							<td width="20%">
								<label>Name:</label>
							</td>
                            <td width="80%">
                                <input type="text" name="name" placeholder="Enter Name" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
							<td>
								<label>Password:</label>
							</td>
                            <td>
                                <input type="text" name="password" placeholder="Enter Password" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
							<td>
								<label>Email:</label>
							</td>
                            <td>
                                <input type="email" name="email" placeholder="Enter Valid Email" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
							<td>
								<label>User Role:</label>
							</td>
                            <td>
                                <select id="select" name="role"class="medium">
									<option>Select User Role</option>
									<option value="0">Admin</option>
									<option value="1">Author</option>
									<option value="2">Editor</option>
								</select>
                            </td>
                        </tr>
						
						<tr>
							<td>
                                <label>Details:</label>
                            </td>
							<td>
								<textarea class="tinymce" name="details"></textarea>
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