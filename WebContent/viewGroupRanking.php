<?php
	include ("header.php");
	include ("navbar.php");
?>

<div class="container">

<div class="panel panel-primary">
		<div class="panel-heading">Aggregate Ranking of All Groups</div>
		<div class="panel-body">
		<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Ranking</th>
						<th>Group</th>
                        <th>Aggregated Result (%)</th></tg>
					</tr>
				</thead>
				<tbody>
				<?php 
				require_once ('PHP/DBConnection.php');
                $getGradesSQL = "SELECT groupAssessed, assignedMarker, AVG(grade) as aggregatedResult
                            FROM
                                ( SELECT groupAssessed, assignedMarker, (Content+Style+Sources)/3 AS grade
                                FROM assesments
                                ORDER BY Grade DESC ) AS singleAssessment
                            GROUP BY groupAssessed
                            ORDER BY aggregatedResult DESC";

                $preparedStatement = $conn->stmt_init();
                $preparedStatement = $conn->prepare($getGradesSQL);
                $preparedStatement->execute();
                $result = $preparedStatement -> get_result();

                if ( ($result === FALSE) || ($result->num_rows === 0) )
                {
                    echo '<tr>
                        <td colspan="3" style="text-align: left; font-size: 20px;">
                            There are no rankings available
                        </td>
                      </tr>';
                } else
                {
                    $rank = 1;
                    while ($row = $result->fetch_assoc())
                    {
                        // Columns returned will be groupAssessed, assignedMarker, aggregatedResult
                        $groupAssessed      = $row["groupAssessed"];
                        $aggregatedResult   = round($row["aggregatedResult"], 2);

                        echo "<tr>
                                  <td>$rank</td>
                                  <td>$groupAssessed</td>
                                  <td>$aggregatedResult</td>
                                  </tr>";
                        $rank++;
                    }
                }
				?>
				</tbody>
			</table>
		</div>
		</div>
	   </div>
	   
	    <?php
    include ("footer.php");
    ?>

</div>
</html>
	
