<?php
require_once ('DBConnection.php');
// get the post information
$title = $_POST ['title'];
$content = $_POST ['content'];
$date = date("Y-m-d");

//check the session information
session_start();
if(isset($_SESSION["peergroup"])){
	$group = $_SESSION["peergroup"];
}
if(isset($_SESSION["userName"])){
	$user = $_SESSION["userName"];
}

$sql = "INSERT INTO forum (forumTitle,date,`group`,author) VALUES ('$title','$date','$group','$user')";
if ($conn->query ( $sql ) === true) {
	// output data of each row
	$sql = "SELECT MAX(`forum`) FROM forum";
	$result =$conn->query($sql);
	if($result->num_rows >0){
		$data = $result -> fetch_assoc();
		$id = $data["MAX(`forum`)"];	
	}
	 	$sql = "INSERT INTO post (postTitle,author,idForum,date,content) VALUES ('$title','$user','$id','$date','$content')";
	if($conn->query($sql) ===true){
	header ( 'location: ../forumPage.php' );
	}else{
		echo "error".$sql."<br>".$conn->error;
	}
	
} else {
	echo $_SESSION["peergroup"];
	echo "Error:" . $sql . "<br>" . $conn->error;
}

?>