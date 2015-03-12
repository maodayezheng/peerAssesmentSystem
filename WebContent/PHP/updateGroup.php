<?php
require_once ('DBConnection.php');
if($_POST){
foreach($_POST as $key => $students){
	foreach($students as $username => $group){
		$sql = "UPDATE account SET `peergroup` = '$group' WHERE `userName` = $username";
		$conn->query($sql);
	}
}
}
header ( 'location: ../admin.php');
?>