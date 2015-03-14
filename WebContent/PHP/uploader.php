<?php 

require_once ('DBConnection.php');

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];

	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);
	
	//$peerGroup = $_SESSION ['peergroup'];
	
	$sql = "INSERT INTO reportbody (groupReportID,ReportContent,author) VALUES ('6','$content','John');";
	
	if ($conn->query ( $sql ) === true) {
		// output data of each row
		echo "Selection complete";
		//header ( 'location: ../gradeReport.php' );
	} else {
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
	
	
	//header("location: ../submitReport.php");
}

?>