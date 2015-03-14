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
			<li role="presentation" class="active"><a href="#assessment_results"
				aria-controls="assessment_results" role="tab" data-toggle="tab">
					Assessment Results </a></li>
			<li role="presentation"><a href="#ranking" aria-controls="ranking"
				role="tab" data-toggle="tab"> Ranking</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="assessment_results">

                <?php
                    include("pageSnippets/resultsAndRanking/assessmentResultsTab.php");
                ?>


            </div>
			<div role="tabpanel" class="tab-pane" id="ranking">
				<p> 
<?php

    function includeRanking($file, $includeThreadVariables) { include($file); }

    $userName       = $_SESSION["userName"];
    $groupNumber    = $_SESSION["peergroup"];

    $getGradesSQL = "select groupAssessed AS Team, (Assesment+Assesment1+Assesment2)/3 AS Grade from assesments group by Grade DESC;";

    $preparedStatement = $conn->stmt_init();
    $preparedStatement = $conn->prepare($getGradesSQL);
    //$preparedStatement->bind_param('i', $groupNumber); // i because $groupNumber should be an integer. 
    $preparedStatement->execute();

    $result = $preparedStatement -> get_result();

    //In $result === false then no results were found
    if ( ($result === FALSE) || ($result->num_rows === 0) )
    {
        echo '<tr>
                <td colspan="2" style="text-align: left; font-size: 20px;">
                     Your group\'s forum is currently empty. <br />
                     Click "Create a thread" to start posting!
                </td>
              </tr>';
    } else
    {
    	
    	$rankedGrades = array();
        while ($row = $result->fetch_assoc())
        {
        	
        	foreach ($row as $key => $value) {
        		echo "$key: $value <br>";
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

?>
                </p>
			</div>
		</div>

	</div>

    <?php
        include ("footer.php");
    ?>

</div>
</html>