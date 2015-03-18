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
		
		$fileContents = file_get_contents('up/xmlLG.xml');
		
		//echo $fileContents;
		
		$xml = simplexml_load_string($fileContents); # creates a Simple XML object from a string
		
		print_r(strval($xml));
// 		 function xml2array ( $xml, $out = array () )
// {
// 	echo "hi";
//     foreach ( (array) $xml as $index => $node )
//         $out[$index] = ( is_object ( $node ) ) ? xml2array ( $node ) : $node;
// print_r($out);
//     return $out;
}

		
	};
	

	
 	session_start(); 

  	$peerGroup = $_SESSION ['peergroup']; 	
  	$sql = "INSERT INTO freetextreports (id,content) VALUES ('$peerGroup','$content')"; 
	
  	if ($conn->query ( $sql ) === true) { 
		 
  		echo "Selection complete"; 
 		header ( 'location: ../gradeReport.php' ); 
  	} else { 		echo "Error:" . $sql . "<br>" . $conn->error; 
	}
	
?>
