    
            <?php 
            
            require_once 'PHP/DBConnection.php';
            
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
            ?>

