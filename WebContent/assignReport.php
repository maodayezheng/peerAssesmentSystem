<?php
	include ("header.php");
	include ("navbar.php")
?>

<div class="container">

<div class="panel panel-primary">
		<div class="panel-heading">Current Assignment</div>
		<div class="panel-body">
		<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th colspan="2">Assigned Marker</th>
						<th>Group Assessed</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				require_once ('PHP/DBConnection.php');
				$sql = "SELECT * FROM assesments";
				$results = $conn ->query($sql);
				if($results->num_rows>0){
					while ($row = $results->fetch_assoc()){
						$marker = $row["assignedMarker"];
						$group = $row["groupAssessed"];
						echo  "<tr><td colspan =\"2\">$marker</td><td>$group</td></tr>";
					}
				}
				?>
				</tbody>
			</table>
		</div>
		</div>
		<a href="#postForum" data-toggle="modal" data-target="#postForum"
				class="btn btn-primary btn-bg pull-right">New Assignment</a>
				
				<div class="modal fade" id="postForum" tabindex="-1" role="dialog"
				aria-labelledby="postForum" aria-hidden="true">
				<div class="modal-dialog">
				<form action="PHP/submitAssignment.php" method="POST" role="form">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Post to Forum</h4>
						</div>
						<div class="modal-body">
								<div>
									<h4>
										<b>Assigned Marker</b>
									</h4>
									<select name="assigned_marker">
									<option value ="1">1</option>
									<option value ="2">2</option>
									<option value ="3">3</option>
									<option value ="4">4</option>
									<option value ="5">5</option>
									<option value ="6">6</option>
									<option value ="7">7</option>
									<option value ="8">8</option>
									<option value ="9">9</option>
									<option value ="10">10</option>
									<option value ="11">11</option>
									<option value ="12">12</option>
									<option value ="13">13</option>
									<option value ="14">14</option>
									<option value ="15">15</option>
									<option value ="16">16</option>
									<option value ="17">17</option>
									<option value ="18">18</option>
									<option value ="19">19</option>
									<option value ="20">20</option>
									</select>
									<br>
								</div>

								<div>
									<h4>
										<b>Group Assessed</b>
									</h4>
									<select name="group_assessed">
									<option value ="1">1</option>
									<option value ="2">2</option>
									<option value ="3">3</option>
									<option value ="4">4</option>
									<option value ="5">5</option>
									<option value ="6">6</option>
									<option value ="7">7</option>
									<option value ="8">8</option>
									<option value ="9">9</option>
									<option value ="10">10</option>
									<option value ="11">11</option>
									<option value ="12">12</option>
									<option value ="13">13</option>
									<option value ="14">14</option>
									<option value ="15">15</option>
									<option value ="16">16</option>
									<option value ="17">17</option>
									<option value ="18">18</option>
									<option value ="19">19</option>
									<option value ="20">20</option>
									</select>
									<br>
								</div>
							</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
								data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success"
								>Submit</button>
						</div>
					</div>
					</form>					
				</div>
			</div>
		
</div>