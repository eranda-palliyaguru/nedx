<?php

include('connect.php');
$c1=1;
$c2=0;
	
$sql = "UPDATE sales 
        SET call_id=?
		WHERE call_id=?";
$q = $db->prepare($sql);
$q->execute(array($c1,$c2));
	

?>