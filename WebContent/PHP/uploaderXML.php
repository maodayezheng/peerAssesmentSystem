<?php 

require_once ('DBConnection.php');

$uploads_dir = '/up';

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
	
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];

	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	//$content = addslashes($content);
	fclose($fp);
	
	//set file destination
	
	$fileD = "up/".$fileName;
	
	if(move_uploaded_file($tmpName,$fileD)){
		
		echo $fileD;
		
	};
	
// $myXMLData =
// "<?xml version='1.0' encoding='UTF-8'?>
// <report>
// <title>LG</title>
// <abstract>new LG</abstract>
// <body>improved LG</body>
// </report>";

// $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
//print_r($xml);
	
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
