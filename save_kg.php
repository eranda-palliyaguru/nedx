
<?php
include("connect.php");
 date_default_timezone_set("Asia/Colombo");

$id=$_POST['id'];
$kg=$_POST['kg'];

$action="1";

if($kg < 1.2){$amount="200";}else{
	$kg1=$kg-1;
	$amount=$kg1*100;
	$amount=$amount+200;
}

$sql = "UPDATE pick_order 
        SET kg=?,action=?,bill_time=?,amount=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($kg,$action,$bill_time,$amount,$id));

header("location: bill.php?id=$id");
?>