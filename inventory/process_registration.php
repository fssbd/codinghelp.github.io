<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "Connected successfully";
}

$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$number = $_POST['num'];
$gender = $_POST['gender'];

var_dump($_POST);
//, email_id, password, phone_number, gender
$sql = "insert into  inventoryms.users(username,password,email) values('".$first_name."','".$pass."','".$email."')";

if($conn->query($sql)){
    echo "data inserted!";
    header('Location: login.php');
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}