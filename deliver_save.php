
<?php
include("connect.php");
 date_default_timezone_set("Asia/Colombo");

$id=$_POST['id'];


$action="2";
$time=date('H.a');
$date=date('Y-m-d');

$sql = "UPDATE pick_order
        SET action=?,deliver_time=?,date=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($action,$time,$date,$id));

header("location: bill.php?id=$id");
?>
