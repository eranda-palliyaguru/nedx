<?php 

include("connect.php");

 date_default_timezone_set("Asia/Colombo");



$id=$_GET['id'];
$key=$_GET['key'];
$user=$_GET['user'];



if($key=="00007000700009025"){



$date=date("Y-m-d");

$time=date("h.i");

		

$sql="INSERT INTO call_up (number,user,date,time) VALUES (:a,:b,:c,:d)";

$ql=$db->prepare($sql);

$ql->execute(array(':a'=>$id,':b'=>$user,':c'=>$date,':d'=>$time));
}


?>