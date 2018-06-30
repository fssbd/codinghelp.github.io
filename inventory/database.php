<?php
$user="root";
$password="";
$db="test";
$conn=new mysql("localhost",$user,$password,$db) or die("not found");
echo "You are Connected";
?>