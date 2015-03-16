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
			<ul class="list-group">

				
                        
                        <?php 
                        require_once ('PHP/DBConnection.php');
                        $marked= $_SESSION['peergroup'];
                        
                        $sql = "SELECT groupAssessed FROM assesments WHERE assignedMarker ='$marked';";
                        
                       
                            
                            $result = $conn -> query($sql);
                            
                            if($result ->num_rows >0){
                            
                            	//Goes through each row in table
                            	while($row = $result ->fetch_assoc()){
                            		
                            		$tomark = $row['groupAssessed'];
                            		
                            
                            		echo '<li class="list-group-item">
					<div class="row toggle" id="dropdown-detail-2"
						data-toggle="detail-2">
						<div class="col-xs-10">'.'Group '.$tomark.'</div>
						<div class="col-xs-2">
							<i class="fa fa-chevron-down pull-right"></i>
						</div>
					</div>
					<div id="detail-2">
						<hr></hr>
						<div class="container">
							<div class="fluid-row">';
							
							//anything below THIS POINT is in view report content

								
								$sql = "SELECT content
										FROM freetextreprots
										WHERE id=1";
		

 $result = $conn -> query($sql);

 if($result ->num_rows >0){
 	while($row = $result ->fetch_assoc()){

 		$report = $row["content"];
// 		$summary = $row["summary"];

 		echo "<b>Title:</b> $report"."<br>";
// 		echo "<b>Intro:</b> $intro"."<br>";
// 		echo "<b>Main:</b> $main"."<br>";
// 		echo "<b>Discussion:</b> $discussion"."<br>";
// 		echo "<b>Summary:</b> $summary"."<br><br>";

 	};

 	}
// 	echo '<button  href="#gradeReport1" data-toggle="modal" data-target="#gradeReport1"
// 	class="btn btn-success">Grade</button>
// 			';
// 	require_once ('PHP/gradeReportPopup.php');

			
                            		
							//anything above THIS POINT is in view report content
                            		echo '</div>
						</div>
					</div>
				</li>';
                            		
                            
                            	};
                            
                            	}
                            	

			?>

			</ul>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
    $('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
});
	</script>
</html>