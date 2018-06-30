<?php



?>



<html>
<head>
<title> Login From </title>
    <link rel="stylesheet" type="text/css" href="../style.css" ;
</head>
    <body>
        <div class="login-box">
           // <img src="../user%20(2).png" class="user">
            <h2> LogIn Here</h2>
            <form method="post" action="../process/process_login.php">
                <p>User Email</p>
                <input type="text" name="name" placeholder="Enter Your User Name..">
                <p>Password</p>
                <input type="password" name="pass" placeholder="Enter Your Password..">
                 <input type="submit" name="signIn" value="signIn">
                <a href="#">Forget Password..!</a>
                
            </form>
        </div>
    </body>
    
</html>
