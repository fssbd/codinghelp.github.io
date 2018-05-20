<?php ob_start(); ?>   <!---Solution for "output has already sent" Error-->
<?php
//include '../lib/session.php';
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
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
	<link rel="shortcut icon" href="upload/logo.png" />
</head>
<body>
<div class="container">
	<section id="content">
	
		<form action="login.php" method="post">
			<h1>Login Panel</h1>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$email = $fm->validation($_POST['email']);
			$password = $fm->validation(md5($_POST['password']));
			
			$email = mysqli_real_escape_string($db->link1, $email);
			$password = mysqli_real_escape_string($db->link1, $password);
			
			$query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
			
			$result = $db->select($query);
			if($result != false)
			{	
				session_start();
				while($value = $result->fetch_assoc())
				{
					$_SESSION['login']=true;
					$_SESSION['user']=$value['username'];
					$_SESSION['email']=$value['email'];
					$_SESSION['role']=$value['role'];
				}
				
				
				header("Location:index.php");
			}
			else
			{
				echo "<span style='color:red; font-size:18px;'>Username or Password Not Matched !!</span>";
			}
		}

	?>
			<div>
				<input type="text" placeholder="Enter Email" required="" name="email"/>
			</div>
			<div>
				<input type="password" placeholder="Enter Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgetpass.php">Forgot Password?? </a>
		</div>
	</section><!-- content -->
</div><!-- container -->
</body>
</html>