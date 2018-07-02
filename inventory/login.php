<?php 
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['userId'])) {
	header('location: dashboard.php');	
}

$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];
				
				$_SESSION['userId'] = $user_id;

				header('location: dashboard.php');	
			} else{
				
				$errors[] = "Incorrect username/password combination";
			} 
		} else {		
			$errors[] = "Username doesnot exists";		
		}
	}
	
}
?>

<html>
<head>
<title> Login From </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
        <div class="login-box">
           	<img src="images/user.png" class="user">
            <h2> LogIn Here</h2>
            <div class="errorMessages">
				<?php if($errors) {
					foreach ($errors as $key => $value) {
						echo '<div class="alert alert-warning" role="alert">
						<i class="glyphicon glyphicon-exclamation-sign"></i>
						'.$value.'</div>';										
						}
					} ?>
			</div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <p>User Email</p>
                <input type="text" name="username" placeholder="Enter Your User Name..">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Your Password..">
                <!--<button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button>-->
                <input type="submit" name="signIn" value="signIn">
                <a href="#">Forget Password..!</a>
            </form>
        </div>
    </body>
    
</html>
