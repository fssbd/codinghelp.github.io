
<?php 
	include'lib/Session.php';
	Session::init();
?>

<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>


<?php

	$db = new Database();
	$fm=new Format();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<title>All Service</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  	<link rel="stylesheet" type="text/css" href="css/loginstyle.css"/>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

	
	<div class="container">
    <h1 class="welcome text-center">Welcome to AllService</h1>
        <div class="card card-container">
        <h2 class='login_title text-center'>Login</h2>
        <hr>
           <?php
				if($_SERVER['REQUEST_METHOD']=='POST')
				{
					$email=$fm->validation($_POST['email']);
					$password=$_POST['password'];

					$query="select userId,email,password from tbuserinfo where email='$email' and password='$password' ";
					$result=$db->select($query);
					if($result!=false)
					{
						$value=mysqli_fetch_array($result);
						$row=mysqli_num_rows($result);
						if($row>0)
						{
							Session::set("userLogin",true);
							Session::set("userId",$value['userId']);
							Session::set("userEmail",$value['email']);
							header("Location:index.php");
						}
						else
						{
							echo "<span style='color:red;font-size:18px;'>No Result found !!</span>";
						}
					}
					else
					{
						echo "<span style='color:red;font-size:18px;'>Username or Passsword not matched !!</span>";
					}
				}
			?>
            <form action="login.php"  method="post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Email</p>
                <input type="text" name="email" id="inputEmail" class="login_box" placeholder="user@gmail.com" required autofocus>
                <p class="input_title">Password</p>
                <input type="password" name="password" id="inputPassword" class="login_box" placeholder="******" required>
                <div id="remember" class="checkbox">
                    <label>
                        
                    </label>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Login</button>
			    <br>
    			<p class="text-center">Not registered? <a href="register.php">Create an account</a> </p>  
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div>
	
</body>
</html>