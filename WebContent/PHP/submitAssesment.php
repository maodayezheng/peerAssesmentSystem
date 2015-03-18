<?php
require_once 'DBConnection.php';
$comment = $_POST['content-comment'];
$comment1 = $_POST['style-comment'];
$comment2 = $_POST['source-comment'];
$assesment = intval($_POST['content-grade']);
$assesment1 = intval($_POST['style-grade']);
$assesment2 = intval($_POST['source-grade']);
$id = intval($_POST['id']);


$finalMark = ($assesment+$assesment1+$assesment2)/3;
$sql = "UPDATE `peersystem`.`assesments` SET `comment`='$comment', `comment1`='$comment1', `comment2`='$comment2', `Content`='$assesment', `Style`='$assesment1', `Sources`='$assesment2',`finalGrade`=$finalMark WHERE `groupAssessed`='$id';
"; // update the assesment into assesments table 

$conn->query($sql);

$sql = "select groupAssessed as `group` ,AVG(finalGrade) as ave from assesments group by groupAssessed order by ave DESC";
  // caculate and sort the average final grade of each group
$drop = "DELETE From Ranking";
$reset ="ALTER TABLE ranking AUTO_INCREMENT = 1";

// reset the ranking table 
$conn->query($drop);
$conn->query($reset);
$results=$conn -> query($sql);

if($results->num_rows>0){
	
	while($row= $results->fetch_assoc()){
		$finalGrade = $row["ave"];
		$group = $row["group"];
		$sql = "INSERT INTO ranking (finalGrade,peergroup) values ($finalGrade,$group)";
		// insert new data into ranking table 
		// the ranking in the auto-increment key of ranking table 
		$conn->query($sql);
	}
	
}
header('location: ../gradeReport.php');
?>