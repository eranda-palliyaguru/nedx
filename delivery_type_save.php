<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");




$type = $_POST['name'];

//echo $customer_name;

$sql = "INSERT INTO delivery_type (name) VALUES (?)";
$q = $db->prepare($sql);
$q->execute(array($type));


header("location: delivery_type.php");

?>
