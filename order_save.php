<?php
include("connect.php");
 date_default_timezone_set("Asia/Colombo");

$id=$_POST['id'];
$p_id=$_POST['p_id'];

$name=$_POST['name'];
$address=$_POST['address'];
$contact=$_POST['contact'];

$p_name=$_POST['pname'];
$p_address=$_POST['paddress'];
$p_contact=$_POST['pcontact'];

$liquid=$_POST['liquid'];
$fr=$_POST['fr'];


$address=str_replace(",","<br>",$address);
$p_address=str_replace(",","<br>",$p_address);

if($id=="0"){
$sql = "INSERT INTO customer (cus_name,contact_no,address,pick_id) VALUES (:a,:b,:c,:d)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$name,':b'=>$contact,':c'=>$address,':d'=>$p_id));

$result1 = $db->prepare("SELECT * FROM customer   ORDER by customer_id DESC limit 0,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$id=$row1['customer_id'];
		}

}

if($p_id=="0"){
$sql = "INSERT INTO pick_place (name,contact_no,address) VALUES (:a,:b,:c)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$p_name,':b'=>$p_contact,':c'=>$p_address));


	$result1 = $db->prepare("SELECT * FROM pick_place   ORDER by id DESC limit 0,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$p_id=$row1['id'];
		}
}

$f="1";

$date=date("Y-m-d");
$time=date("h.i");

$sql="INSERT INTO pick_order (cus_name,cus_id,contact_no,address,pick_name,pick_address,pick_id,date,s_time) VALUES (:a,:b,:c,:d,:e,:f,:g,:j,:k)";
$ql=$db->prepare($sql);
$ql->execute(array(':a'=>$name,':b'=>$id,':c'=>$contact,':d'=>$address,':e'=>$p_name,':f'=>$p_address,':g'=>$p_id,':j'=>$date,':k'=>$time));


$result1 = $db->prepare("SELECT * FROM pick_order where pick_id='$p_id'  ORDER by id DESC limit 0,1 ");
  $result1->bindParam(':userid', $res);
  $result1->execute();
  for($i=0; $row1 = $result1->fetch(); $i++){
  $order_id=$row1['id'];
  }


$result1 = $db->prepare("SELECT * FROM delivery_type ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
    	$name=$row1['name'];
		$id=$row1['id'];

$type_id=$_POST[$id];

if ($type_id=='1') {
  $sql = "INSERT INTO delivery_type_recode (name,type_id,order_id) VALUES (?,?,?)";
  $q = $db->prepare($sql);
  $q->execute(array($name,$id,$order_id));
}

}
header("location: index.php");
?>
