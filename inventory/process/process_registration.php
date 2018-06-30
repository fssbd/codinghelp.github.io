<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 13-05-18
 * Time: 22.26
 */
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
$pass = $_POST['pass'];
$number = $_POST['num'];
$gender = $_POST['gender'];

var_dump($_POST);
//, email_id, password, phone_number, gender

$sql = "insert into  inventory_management.registration_info (first_name, last_name,email_id, password, phone_number, gender) values('".$first_name."','".$last_name."','".$email."','".$pass."', '".$number."', '".$gender."')";

if($conn->query($sql)){
    echo "data inserted!";
    header('Location: ../views/login.php');
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}