<?php
require_once ('DBConnection.php');
if($_POST){
foreach($_POST as $key => $students){
	foreach($students as $username => $group){
		$sql ="SELECT count(peergroup) AS groupcount FROM account WHERE peergroup = $group";
		$result = $conn->query($sql);
		$count = 0;
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$count = $row["groupcount"];
			}
		}
		if($count <3){
		$sql = "UPDATE account SET `peergroup` = '$group' WHERE `userName` = $username";
		$conn->query($sql);
		}else{
			echo "group $group reaches maximum students' capacity";
			
		}
	}
}
}
header ( 'location: ../admin.php');
?>