<?php
/**
 * The following file is to be included in the resultsAndRanking.php file.
 * It contains the assessment made on the user's report by other groups.
 */
?>

<div class="panel-group" id="accordion">
    <!-- Panel 1 -->
    <div class="panel panel-default" id="panel1">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-target="#collapseOne" href="#collapseOne" class="collapsed">
                    Group <b> 1's </b> Assessment
                </a>
            </h4>
        </div>

        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
            
            <?php 
            
            require_once 'PHP/DBConnection.php';
            
            $sql = "SELECT * FROM assesmentheader WHERE Author = 1";
            
            $result = $conn -> query($sql);
            
            if($result ->num_rows >0){
            
            	//Goes through each row in table
            	while($row = $result ->fetch_assoc()){
            		$comment = $row["comment"];
            		$comment1 = $row["comment1"];
            		$comment2 = $row["comment2"];
            		$Assesment = $row["Assesment"];
            		$Assesment1 = $row["Assesment1"];
            		$Assesment2 = $row["Assesment2"];
            		
            
            		echo "<b>Content Comment:</b> $comment"."<br>";
            		echo "<b>Delivery Comment:</b> $comment1"."<br>";
            		echo "<b>Style Comment:</b> $comment2"."<br>";
            				echo "<b>Content Grade:</b> $Assesment"."<br>";
            				echo "<b>Delivery Grade:</b> $Assesment1"."<br>";
            				echo "<b>Style Grade:</b> $Assesment2"."<br><br>";
            				
            				$totalGrade = ($Assesment+$Assesment1+$Assesment2)/3;
            				
            				function displayGrade($totalGrade){
            					if ($totalGrade > 69){
            						echo "<legend>Well done you got a distinction: ".$totalGrade."%</legend>";
            					} else if ($totalGrade > 59 && $totalGrade < 70){
            						echo "You got a Merit: ".$totalGrade;
            					} else if ($totalGrade > 49 && $totalGrade < 60){
            						echo "You got a Pass: ".$totalGrade;
            					} else{
            						echo "Fail";
            					}
            				}
            				echo displayGrade($totalGrade);          				
            
            	};
            
            	}         
            ?>
            </div>
        </div>
    </div>

    <!-- Panel 2 Example -->
    <div class="panel panel-default" id="panel2">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-target="#collapseTwo" href="#collapseTwo" class="collapsed">
                    Group <b> ??'s </b> Assessment
                </a>
            </h4>
        </div>

        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <p> Enter information from the database about the group's assessment here.</p>
            </div>
        </div>
    </div>

    <!-- Panel 3 Example -->
    <div class="panel panel-default" id="panel3">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-target="#collapseThree"
                   href="#collapseThree" class="collapsed">
                    Group <b> ??'s </b> Assessment
                </a>
            </h4>
        </div>

        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <p> Enter information from the database about the group's assessment here.</p>
            </div>
        </div>
    </div>
</div>
