<?php 
session_start();
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
	
	$peerGroup = $_SESSION ['peergroup'];
	$sql = "INSERT INTO freetextreports (id,reportcontent) VALUES ('$peerGroup','$content')";
	
	if ($conn->query ( $sql ) === true) {
		
	echo "Selection complete";
 		header ( 'location: ../submitReport.php' );
  	} else { 		echo "Error:" . $sql . "<br>" . $conn->error;
	}

		
	};
	

	



	
?>
