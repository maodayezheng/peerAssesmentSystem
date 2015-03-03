<?php
require_once ('DBConnection.php');
//$conn = new mysqli($servername,$username,$password,$dbname,$port);


 	$titleforum = $_POST ['titleForum'];
 	$contentforum = $_POST ['contentForum'];

$sql = "INSERT INTO forum (forum,forumTitle,forumContent,date) VALUES (NULL,'$titleforum','$contentforum','2012-11-23')";

if ($conn->query($sql)===true) {
	// output data of each row
	echo "Selection complete";
	header('location: ../forumPage.php');
} else {
	echo "Error:". $sql."<br>". $conn -> error;
}


?>