<?php
	include ("header.php");
	include ("navbar.php");
?>

<div class="container">

<div class="panel panel-primary">
		<div class="panel-heading">Current Assignment</div>
		<div class="panel-body">
		<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th colspan="2">Ranking</th>
						<th>Group</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				require_once ('PHP/DBConnection.php');
				$sql = "SELECT * FROM Ranking";
				$results = $conn ->query($sql);
				if($results->num_rows>0){
					while ($row = $results->fetch_assoc()){
						$group = $row["peergroup"];
						$ranking = $row["rank"];
						echo  "<tr><td colspan =\"2\">$ranking</td><td>$group</td></tr>";
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
	
