<!DOCTYPE html>
<html>
<head>
<title>simple Registration Form</title>
<!--    <link rel="stylesheet" href="css/st.css"type="text/css">    -->
    <link rel="stylesheet" href="cs/registrtn.css" type="text/css">
</head>
<body>
<div class="Simple-From">
<form id="registration" method="post" action="process/process_registration.php">
    <input type="text" name="Fname" id="button" placeholder="  Enter Your First Name"><br><br>
    <input type="text" name="Lname" id="button" placeholder="  Enter Your Second Name"><br><br>
    <input type="email" name="email" id="button" placeholder="   Enter Your Email Id"><br><br>
    <input type="pass" name="pass" id="button" placeholder="   Enter Your PassWord"><br><br>
    <select id="ph"><option>+88</option><option>+92</option><option>+93</option>
        <option>+94</option><option>+95</option></select>
    <input type="number" name="num" placeholder="  Enter Contact Number "
    id="phone"><br><br>
    <input type="radio" name="gender" id="rd"><span id="but">Male</span>
    <input type ="radio" name="gender" id="rd"><span id="but">Female</span><br><br>
    <input type="submit" value="register" id="butt">
    </form>
</div>
</body>
</html>