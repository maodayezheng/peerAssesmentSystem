	<?php
	include ("header.php");
	include ("navbar.php")?>


<div class="container">
                <form id="selection" action='PHP/viewMembers.php' method = "POST">
				<div class="col-md-offset-4"><p>Choose The Group: <select name="group">
				<?php 
				session_start();
				if(!isset($_SESSION["Selected_Group"])){
					$_SESSION["Selected_Group"] =0;
				}
				 echo "<option value=\"ALL\">ALL</option>";
                 for($i = 1 ; $i< 20;$i++){
				 	if($i===intval($_SESSION["Selected_Group"])){
				 		echo "<option value=\"$i\" selected=\"selected\">$i</option>";
				 	}else{
				 		echo "<option value=\"$i\">$i</option>";
				 	}
				 }
				?>
				</select>  <input class="btn btn-success" type="submit" value="Submit"></p></div>
				</form>
				<form id="loginform" class="form-horizontal" role="form"
					action='PHP/updateGroup.php' method="POST">
					<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th colspan="2">Name</th>
						<th>Group</th>
					</tr>
				</thead>
				<tbody>
				<?php
					require_once ('PHP/DBConnection.php');
					$selected_group = intval($_SESSION["Selected_Group"]);
					$sql = "";
					if($selected_group === 0){
					$sql = "SELECT * FROM account WHERE `accountType` = 'student'";
					}else{
					$sql = "SELECT * FROM account WHERE `accountType` = 'student' AND `peergroup` =$selected_group";
					}
					$results = $conn->query($sql);
					if($results -> num_rows >0){
						while($row = $results ->fetch_assoc()){
							$user_name = $row["userName"];
							$first_name = $row["fName"];
							$last_name = $row["lName"];
							$peergroup = $row["peergroup"];
							echo  "<tr><td colspan =\"2\">$first_name $last_name</td><td><input type=\"text\" name=\"students['$user_name']\" value=\"$peergroup\"></td></tr>";
						}
					}else{	
						echo "<tr><td colspan=\"2\">No Student in this group</td></tr>";
					}
					?></tbody>
			</table>
                <div class="col-md-offset-11"><input class="btn btn-success" type="submit" value="Submit"></div>
				</form>

</div>
