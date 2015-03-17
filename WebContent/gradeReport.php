<?php
session_start();
include ("header.php");
include ("navbar.php");
?>
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Select a group below to view their report</h3>
			</div>
                     <?php 
                        require_once ('PHP/DBConnection.php');
                        $assignedMarker = $_SESSION['peergroup'];
                        
                                                
                        $sql = "SELECT a.*, ftr.*
								FROM assesments AS a INNER JOIN freetextreports AS ftr ON a.groupAssessed = ftr.id
								WHERE a.assignedMarker=1;";
                        
                       $result = $conn -> query($sql);
                       
                       
                            
                       if($result ->num_rows >0){
                            	//Goes through each row in table
                            	while($row = $result ->fetch_assoc()){
               		
                            		$rowVariables = array(
                            			"assignedMarker" 	=> $row["assignedMarker"],
                            			"groupAssessed" 	=> $row["groupAssessed"],
                            			"comment" 			=> $row["comment"],
                            			"comment1" 			=> $row["comment1"],
                            			"comment2" 			=> $row["comment2"],
                            			"id"				=> $row["id"],
                            			"Content" 			=> $row["Content"],
                            			"Style" 			=> $row["Style"],
                            			"Sources" 			=> $row["Sources"],
                            			"reportContent" 	=> $row["reportcontent"]
                            		);
                            		echo $rowVariables["groupAssessed"]."<br>";
                            		
                            			
                            		echo $rowVariables["Content"]."<br>";
                            		
                            		

 	}
                            	};
			?>
		</div>
	</div>
</div>
</html>