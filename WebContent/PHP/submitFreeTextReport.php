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
$title = $_POST ['titleReport'];
$abstract = $_POST ['abstractReport'];
$intro = $_POST ['introReport'];
$main = $_POST ['mainReport'];
$discussion = $_POST ['discussionReport'];
$summary = $_POST ['summaryReport'];

$sql = "INSERT INTO reportbody (report,ReportBody,title,author,abstract,introduction,main,discussion,summary) VALUES ('$groupNumber','NULL','$title','ERIC','$abstract','$intro','$main','$discussion','$summary')";

if ($conn->query ( $sql ) === true) {
	// output data of each row
	echo "Selection complete";
	header ( 'location: ../submitReport.php' );
} else {
	echo "Error:" . $sql . "<br>" . $conn->error;
}

?>