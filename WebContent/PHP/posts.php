<?php
require_once ('DBConnection.php');

$forum = $_GET['id'];
session_start();
if($forum!==null){
if(!isset($_SESSION["forum"])){
	$_SESSION["forum"] = $forum;
}elseif($_SESSION["forum"]!==$forum){
	$_SESSION["forum"] =$forum;
}
}
$forum = $_SESSION["forum"];
$sql = "SELECT * FROM post WHERE idForum = '$forum'";
$result = $conn -> query($sql);

if($result ->num_rows >0){
	while($row = $result ->fetch_assoc()){
		 $title = $row["postTitle"];
		 $date = $row["date"];
		 $author = $row["Author"];
		 $content = $row["content"];
		echo "<tr><td colspan=\"2\">".$title."</td>
		  <td>".$content."</td>
		  <td>".$author."</td>
		  <td>".$date."</td>
	 </tr>";
		
	};
	
}
?>