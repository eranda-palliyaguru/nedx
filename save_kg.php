
<?php
include("connect.php");
 date_default_timezone_set("Asia/Colombo");

$id=$_POST['id'];
$kg=$_POST['kg'];
$p_id=$_POST['p_id'];

$action="1";

$kg1st=200;
$kg2end=100;

$result1 = $db->prepare("SELECT * FROM rate WHERE cus_id='$p_id'  ");
$result1->bindParam(':userid', $res);
$result1->execute();
for($i=0; $row1 = $result1->fetch(); $i++){
$kg1st=$row1['kg_1st'];
$kg2end=$row1['kg_2end'];
}


if($kg < 1.2){$amount=$kg1st;}else{
	$kg1=$kg-1;
	$amount=$kg1*$kg2end;
	$amount=$amount+$kg1st;
}
$bill_time=date('H.i');
$sql = "UPDATE pick_order
        SET kg=?,action=?,bill_time=?,amount=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($kg,$action,$bill_time,$amount,$id));

header("location: bill.php?id=$id");
?>
