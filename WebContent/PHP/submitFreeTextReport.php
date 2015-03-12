<?php
require_once ('DBConnection.php');

//check the session information
session_start();
if (isset ( $_SESSION ["peergroup"] )) {
	$group = $_SESSION ["peergroup"];
}
if (isset ( $_SESSION ["userName"] )) {
	$user = $_SESSION ["userName"];
}

$groupNumber = $_POST ['groupNumber'];
$pasteReport = $_POST ['pasteReport'];


$sql = "INSERT INTO reportbody (report,ReportContent,author) VALUES ('$groupNumber','$pasteReport','ERIC')";

if ($conn->query ( $sql ) === true) {
	// output data of each row
	echo "Selection complete";
	header ( 'location: ../submitReport.php' );
} else {
	echo "Error:" . $sql . "<br>" . $conn->error;
}

?>