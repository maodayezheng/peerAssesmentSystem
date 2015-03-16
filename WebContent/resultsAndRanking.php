<?php

    include ("header.php");
    include ("navbar.php");
    session_start();
?>

<div class="container">
	<div role="tabpanel" class="panel panel-primary">

		<div class="panel-heading">View Assessments and Ranking</div>
		<br />

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation"><a href="#assessment_results"
				aria-controls="assessment_results" role="tab" data-toggle="tab">
					Assessment Results </a></li>
			<li role="presentation" class="active"><a href="#ranking" aria-controls="ranking"
				role="tab" data-toggle="tab"> Ranking</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
            <?php 
            
            require_once("PHP/DBConnection.php");
            echo "<div role=\"tabpanel\" class=\"tab-pane active\" id=\"ranking\">
				<p> ";
            $getGradesSQL = "select groupAssessed AS Team, (Content+Style+Sources)/3 AS Grade from assesments group by Grade DESC;";
            
            $preparedStatement = $conn->stmt_init();
            $preparedStatement = $conn->prepare($getGradesSQL);
            $preparedStatement->execute();
            
            $result = $preparedStatement -> get_result();
            
            //In $result === false then no results were found
            if ( ($result === FALSE) || ($result->num_rows === 0) )
            {
            	echo '<tr>
                <td colspan="2" style="text-align: left; font-size: 20px;">
                    There are no rankings available
                </td>
              </tr>';
            } else
            {
            	$count=1;
            	$rankedGrades = array();
            	while ($row = $result->fetch_assoc())
            	{
            
            		foreach ($row as $key => $value) {
            
            			if ($key == "Team") {
            				$value = "Ranked: ".$count." is group: ".$value;
            				$count++;
            				 
            			} else if ($key = "Grade") {
            				 
            				$value = "<legend>Grade = ".intval($value)."%"."</legend>";
            			}
            
            			echo '<div align="center">'.$value."<br>".'</div>';
            			 
            		}
            		 
            
            		//print_r($row);
            		// Columns in forumthreads table: (threadID, peergroup, threadTitle, threadAuthor, dateTimeCreated)
            
            		// $threadVariables = array
            		// (
            		// "Assesment" => $row["Assesment"],
            		// "Assesment1" => $row["Assesment1"],
            		// "Assesment2" => $row["Assesment2"],
            		// "groupAssessed" => $row["groupAssessed"]
            
            		// );
            		// array_push($rankedGrades, ($row["Assesment2"]+$row["Assesment1"]+$row["Assesment"])/3);
            
            		// includeRanking("ranking.php", $threadVariables);
            	}
            	// 	sort ( $rankedGrades );
            	// 	print_r ( array_values ( $rankedGrades ) );
            }
            echo "</p>";
            echo "</div>";
            //---------------------------------
            
            echo "<div role=\"tabpanel\" class=\"tab-pane\" id=\"assessment_results\">";
            $sql = "SELECT * FROM assesments WHERE groupAssessed = 6";
            $result = $conn -> query($sql);
            
            if($result ->num_rows >0){
            	//Goes through each row in table
            	while($row = $result ->fetch_assoc()){
            		$maker = $row["assignedMarker"];
            		$comment = $row["comment"];
            		$comment1 = $row["comment1"];
            		$comment2 = $row["comment2"];
            		$Assesment = $row["Content"];
            		$Assesment1 = $row["Style"];
            		$Assesment2 = $row["Sources"];
            		echo "<div class=\"panel panel-default\">";
            		echo "<div class=\"panel-heading\">";
            		echo " <h4 class=\"panel-title\">";
            		echo "<a data-toggle=\"collapse\" data-target=\"#collapse$maker\" href=\"#collapse$maker\" class=\"collapsed\">
            		Group <b>$maker's</b> Assessment
            		</a>";
            		echo "</h4>";
            		echo "</div>"; // close the heading 
            		echo "<div id=\"collapse$maker\" class=\"panel-collapse collapse\">
            		<div class=\"panel-body\">
                	<b>Content Comment:</b>$comment<br>
            		<b>Delivery Comment:</b>$comment1<br>
            		<b>Style Comment:</b> $comment2<br>
            		<b>Content Grade:</b> $Assesment<br>
            		<b>Delivery Grade:</b> $Assesment1<br>
            		<b>Style Grade:</b> $Assesment2<br><br>";
            		$totalGrade = ($Assesment+$Assesment1+$Assesment2)/3;
            		
            		function displayGrade($totalGrade){
            			if ($totalGrade > 69){
            				echo "<legend>Well done you got a distinction: ".$totalGrade."%</legend>";
            			} else if ($totalGrade > 59 && $totalGrade < 70){
            				echo "You got a Merit: ".$totalGrade;
            			} else if ($totalGrade > 49 && $totalGrade < 60){
            				echo "You got a Pass: ".$totalGrade;
            			} else{
            				echo "Fail: ".$totalGrade;
            			}
            		}
            		echo displayGrade($totalGrade);
            		echo "</div>
        			</div>
    				</div>";
            		echo "</div>";// close the panel

            	};
            
            	}
            	echo "</div>";         
            ?>
			
<?php
	

?>
		</div>

	</div>

    <?php
        include ("footer.php");
    ?>

</div>
</html>