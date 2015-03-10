<?php
require_once ('DBConnection.php');
// $conn = new mysqli($servername,$username,$password,$dbname,$port);

$groupNumber = $_POST ['groupNumber'];
$title = $_POST ['titleReport'];
$abstract = $_POST ['abstractReport'];
$intro = $_POST ['introReport'];
$main = $_POST ['mainReport'];
$discussion = $_POST ['discussionReport'];
$summary = $_POST ['summaryReport'];

$sql = "INSERT INTO reportbody (report,ReportBody,title,author,introduction,main,discussion,summary) VALUES ('$groupNumber','$title','Eric','$abstract','$intro','$main','$discussion','$summary')";

if ($conn->query ( $sql ) === true) {
	// output data of each row
	echo "Selection complete";
	header ( 'location: ../submitReport.php' );
} else {
	echo "Error:" . $sql . "<br>" . $conn->error;
}

?>