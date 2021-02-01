<?php

session_start();
include('connect.php');
$cus_name = $_POST['cus_name'];
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];
$address = $_POST['address'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$fst = $_POST['fst'];
$send = $_POST['send'];



$sql = "INSERT INTO pick_place (name,address,contact_no) VALUES (?,?,?)";
$ql = $db->prepare($sql);
$ql->execute(array($cus_name,$address,$phone_no));


$result1 = $db->prepare("SELECT * FROM pick_place ORDER by id DESC limit 0,1 ");
  $result1->bindParam(':userid', $res);
  $result1->execute();
  for($i=0; $row1 = $result1->fetch(); $i++){
  $cus_id=$row1['id'];
  }


$sql = "INSERT INTO rate (customer,cus_id,kg_1st,kg_2end) VALUES (?,?,?,?)";
$ql = $db->prepare($sql);
$ql->execute(array($cus_name,$cus_id,$fst,$send));

$sql = "INSERT INTO user (username,password,name,position,mac_id) VALUES (?,?,?,?,?)";
$ql = $db->prepare($sql);
$ql->execute(array($user_name,$password,$cus_name,'user',$cus_id));


header("location: cus.php");


 ?>
