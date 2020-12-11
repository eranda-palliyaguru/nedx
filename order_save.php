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
$sql = "INSERT INTO customer (cus_name,contact_no,address) VALUES (:a,:b,:c)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$name,':b'=>$contact,':c'=>$address));	
	
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
		
$sql="INSERT INTO pick_order (cus_name,cus_id,contact_no,address,pick_name,pick_address,pick_id,frangible,liquid,date,s_time) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k)";
$ql=$db->prepare($sql);
$ql->execute(array(':a'=>$name,':b'=>$id,':c'=>$contact,':d'=>$address,':e'=>$p_name,':f'=>$p_address,':g'=>$p_id,':h'=>$fr,':i'=>$liquid,':j'=>$date,':k'=>$time));

?>