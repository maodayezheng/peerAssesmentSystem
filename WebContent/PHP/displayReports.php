<?php 

require_once ('DBConnection.php');

$sql = "SELECT * FROM reportbody";

$result = $conn -> query($sql);

if($result ->num_rows >0){
	
	//Goes through each row in table
		while($row = $result ->fetch_assoc()){
			$reportBody = $row["ReportBody"];
			$title = $row["title"];
			$abstract = $row["abstract"];
			$intro = $row["introduction"];
			$main = $row["main"];	
			$discussion = $row["discussion"];
			$summary = $row["summary"];

			echo "<b>Title:</b> $title"."<br>";
			echo "<b>Intro:</b> $intro"."<br>";
			echo "<b>Main:</b> $main"."<br>";
			echo "<b>Discussion:</b> $discussion"."<br>";
			echo "<b>Summary:</b> $summary"."<br>";
		
	};

}

?>