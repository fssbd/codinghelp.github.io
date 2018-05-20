<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<style type="text/css">
	.cpassForm{
		width: 60%;
		border: 1px solid #315C7C;
		padding: 20px 30px;
		border-radius: 5px;
		margin: 65px auto;
	}
	input.medium {
		width: 98%;
		height:22px;
	}
	
	.medium {
		width: 100.2%;
		height:33px;
	}
	
	.btnSubmit{
		margin-top:10px;
	}
</style>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block"> 
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$email = $fm->validation($_POST['email']);
		$role = $fm->validation($_POST['role']);
		$old = $fm->validation($_POST['old']);
		$new = $fm->validation($_POST['new']);
		
		$email = mysqli_real_escape_string($db->link1, $email);
		$role = mysqli_real_escape_string($db->link1, $role);
		$old = mysqli_real_escape_string($db->link1, $old);
		$new = mysqli_real_escape_string($db->link1, $new);
		
		if(empty($email) || empty($role) || empty($old) || empty($new))
		{
			echo "<span class='error'>Field must not be empty!!</span>";
		}
		else
		{
			$old = md5($old); 
			$new = md5($new); 
			
			
			$emailquery = "select * from tbl_user where email='$email'";
			$emailcheck = $db->select($emailquery);
			if($emailcheck)
			{
				$cquery = "select * from tbl_user where password='$old'";
				$check = $db->select($cquery);
				if($check)
				{
					while($result = $check->fetch_assoc())
					{
						$query = "update tbl_user set password='$new' where email='$email'";
			
						$result = $db->update($query);
						if($result != false)
						{
							echo "<span style='color:green; font-size:18px;'>Password Changed Successfully...</span>";	
						}
						else
						{
							echo "<span style='color:red; font-size:18px;'>Error!! Password Not Changed...</span>";
						}
					}
				}
				else
				{
					echo "<span style='color:red; font-size:18px;'>Error!! Old Password Not Matched...</span>";
				}
			}
			else
			{
				echo "<span style='color:red; font-size:18px;'>Error!! Email Not Found...</span>";
			}
		}	
	}
?>				
                 <form action="" method="post" class="cpassForm">
                    <table class="form">	
						<tr>
                            <td width="25%">
                                <label>Role:</label>
                            </td>
                            <td width="75%">
                                <select name="role" id="" class="medium">
									<option value="">Select Role</option>
									<option value="admin">Admin</option>
									<option value="author">Author</option>
									<option value="editor">Editor</option>
								</select>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Email:</label>
                            </td>
                            <td>
                                <input type="email" placeholder="Enter Email Address..."  name="email" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Old Password:</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="old" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password:</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="new" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" class="btnSubmit" />
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
        </div>
<?php include "inc/footer.php"; ?>