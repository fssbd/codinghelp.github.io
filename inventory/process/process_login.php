<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 13-05-18
 * Time: 23.31
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

$name = $_POST['name'];
$pass = $_POST['pass'];

var_dump($_POST);

$sql = "Select * from inventory_management.registration_info where first_name='".$name."' and password = '".$pass."'";
//$data = $conn->query($sql);
$result = mysqli_query($conn, $sql);
$num = $result->num_rows;
echo $num;
$row = mysqli_fetch_array($result);



////$data = $data->fetch_assoc();
//echo "<pre>";
//var_dump($row);
//echo "</pre>";
if ($num > 0) {
    // output data of each row
    if($row) {
        header('Location: ../index.html');
    }
} else {
    echo "wrong information";
    header('Location: ../login.php');
}