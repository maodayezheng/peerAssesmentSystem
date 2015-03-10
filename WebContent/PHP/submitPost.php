<?php
require_once ('DBConnection.php');
// get the post information
$title = $_POST ['title'];
$content = $_POST ['content'];
$date = date("Y-m-d");

//check the session information
session_start();
if(isset($_SESSION["forum"])){
	$forum = $_SESSION["forum"];
}
if(isset($_SESSION["userName"])){
	$user = $_SESSION["userName"];
}

$sql = "INSERT INTO post (postTitle,date,idForum,author,content) VALUES ('$title','$date','$forum','$user','$content')";
if ($conn->query ( $sql ) === true) {

		header ( 'location: ../postPage.php?id='.$forum);
	
} else {
	echo "Error:" . $sql . "<br>" . $conn->error;
}


?>