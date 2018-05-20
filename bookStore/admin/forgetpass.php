<?php ob_start(); ?>   <!---Solution for "output has already sent" Error-->
<?php
include '../lib/session.php';
//Session::checkLogin();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php include '../helpers/format.php'; ?>
<?php
	$db = new Database();
	$fm = new Format();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$email = $fm->validation($_POST['email']);
			$email = mysqli_real_escape_string($db->link1, $email);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				echo "<span style='color:red; font-size:18px;'>ERROR !! Invalid Email Address.</span>";
			}
			else
			{
				$mailquery = "select * from tbl_user where email = '$email' limit 1";
				$mailCheck = $db->select($mailquery);
		
				if($mailCheck != false)
				{
					while($value = $mailCheck->fetch_assoc())
					{
						$userid   = $value['id'];
						$username = $value['username'];
					}
					
					$text = substr($email,0,3);
					$rand = rand(10000,99999);

					$newpass = "$text$rand";
					$password = md5($newpass);

					$updatequery = "UPDATE tbl_user SET password='$password' WHERE id='$userid'";
					$update_row = $db->update($updatequery);

					$to = "$email";
					$from = "abir1321025@gmail.com";
					$headers= "From: $from\n"; 
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$subject = "Your password";
					$message = "Your Username is: ".$username." and Password is: ".$newpass." Please visit website to login." ;
					
					
					$sendmail = mail($to, $subject, $message, $headers);
					
					if($sendmail)
					{
						echo "<span style='color:green; font-size:18px;'>Please Check your Email for new Password !!</span>";
					}
					else
					{
						echo "<span style='color:red; font-size:18px;'>ERROR!! Email not Sent.</span>";
					}
					
				}
				else
				{
					echo "<span style='color:red; font-size:18px;'>ERROR!! Email not Exist.</span>";
				}
			}
		}
	?>
	
		<form action="" method="post">
			<h1 style="font-size:20px">Password Recovery</h1>
			<div>
				<input type="text" placeholder="Enter Your Registered Email..." name="email"/>
			</div>
			
			<div>
				<input type="submit" value="Send Email" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login !</a>
		</div>
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>