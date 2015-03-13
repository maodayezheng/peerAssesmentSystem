<?php
require_once ('DBConnection.php');
$marker = intval($_POST["assigned_marker"]);
$group = intval($_POST["group_assessed"]);

if($marker !== $group){
	$sql = "INSERT INTO `assesments` (`assignedMarker`,`groupAssessed`) VALUES ($marker,$group)";
if($conn->query($sql) === true){
	
	header ( 'location: ../assignReport.php');
}else{
	echo "error".$sql."<br>".$conn->error;
}
}else{

}

?>