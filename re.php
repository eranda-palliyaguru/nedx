<?php
session_start();
include('connect.php');

$qty=1;
$id=1;
			
$sql = "UPDATE sales 
        SET call_id=?
		";
$q = $db->prepare($sql);
$q->execute(array($qty));
			

?>