
	<?php
	include ("header.php");
	include ("navbar.php")?>

<div class="container">

					<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th colspan="2">Group</th>
						<th>Ranking</th>
					</tr>
				</thead>
				<tbody>
				<?php
					require_once ('PHP/DBConnection.php');
					
					$sql = "SELECT groupAssessed  as Group, (Content+Style+Sources)/3 AS Grade from assesments group by Grade DESC";
					$results = $conn->query($sql);
					$ranking = 1;
					if($results ->num_rows >0){
						while($row = $results ->fetch_assoc()){
							$group = $row["Group"];
							echo  "<tr><td colspan =\"2\">$group</td><td>$ranking</td></tr>";
							$ranking++;
						}
					}else{
						
					
					}
					?></tbody>
			</table>
                <div class="col-md-offset-11"><input class="btn btn-success" type="submit" value="Submit"></div>

</div>

