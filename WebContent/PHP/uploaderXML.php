<?php 

require_once ('DBConnection.php');

$myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
<note>
<title>LG Review</title>
<abstract>New LG is the best</abstract>
<content>improved camera and model</content>
</note>";
//print_r ($content);
//$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
//print_r($xml);

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];

	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	//$content = addslashes($content);
	fclose($fp);
	
	$myXMLData = strval($content);
	
	$xml=simplexml_load_string($myXMLData);
	print_r($xml);
	
	

	//echo $content."<br>";

	
	session_start();

// 	$peerGroup = $_SESSION ['peergroup'];
// 	$sql = "INSERT INTO freetextreprots (id,content) VALUES ('$peerGroup','$content')";
	
// 	if ($conn->query ( $sql ) === true) {
// 		// output data of each row
// 		echo "Selection complete";
// 		//header ( 'location: ../gradeReport.php' );
// 	} else {
// 		echo "Error:" . $sql . "<br>" . $conn->error;
// 	}
	
	
// 	header("location: ../submitReport.php");
 }
