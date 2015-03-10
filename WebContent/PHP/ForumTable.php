<?php
require_once ('DBConnection.php');
session_start();
if(isset($_SESSION["peergroup"])){
	$group = $_SESSION["peergroup"];
}
$sql = "SELECT * FROM forum where `group` ='$group'";

$result = $conn -> query($sql);

if($result ->num_rows >0){
	while($row = $result ->fetch_assoc()){
		 $title = $row["forumTitle"];
		 $date = $row["date"];
		 $author = $row["author"];
		 $forum = $row["forum"];
		echo "<tr><td colspan=\"2\"><a href=\"postPage.php?id=$forum\">".$title."</a></td>
		  <td>".$author."</td>
		  <td>".$date."</td>
	 </tr>";
		
	};
	
}



?>