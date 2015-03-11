<?php
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
<li class="list-group-item">
<div class="row toggle" id="dropdown-detail-1"
		data-toggle="detail-1">
		<div class="col-xs-10">Group 1</div>
		<div class="col-xs-2">
		<i class="fa fa-chevron-down pull-right"></i>
		</div>
		</div>
		<div id="detail-1">
		<hr></hr>
		<div class="container">
		<div class="fluid-row">

		<?php
		require_once ('PHP/DBConnection.php');
$sql = "SELECT Report, title,abstract,introduction,main,discussion,summary
										FROM peersystem.reportbody
										WHERE Report=1;
		";

$result = $conn -> query($sql);

if($result ->num_rows >0){

	//Goes through each row in table
	while($row = $result ->fetch_assoc()){
		//$reportBody = $row["ReportBody"];
		$title = $row["title"];
		$abstract = $row["abstract"];
		$intro = $row["introduction"];
		$main = $row["main"];
		$discussion = $row["discussion"];
		$summary = $row["summary"];

		echo "<b>Title:</b> $title"."<br>";
		echo "<b>Intro:</b> $intro"."<br>";
		echo "<b>Main:</b> $main"."<br>";
		echo "<b>Discussion:</b> $discussion"."<br>";
		echo "<b>Summary:</b> $summary"."<br><br>";

	};

	}
	echo '<button  href="#gradeReport1" data-toggle="modal" data-target="#gradeReport1"
	class="btn btn-success">Grade</button>
			<form action="PHP/submitGrade.php" method="POST" role="form">';
	require_once ('PHP/gradeReportPopup.php');
	echo '</form>';
	 
	//from here write SQL code to insert the selected grade into grade table
               
               
			?>
                     
                    </div>
							</div>
					
					</li>
					<li class="list-group-item">
						<div class="row toggle" id="dropdown-detail-2"
							data-toggle="detail-2">
							<div class="col-xs-10">Group 2</div>
							<div class="col-xs-2">
								<i class="fa fa-chevron-down pull-right"></i>
							</div>
						</div>
						<div id="detail-2">
							<hr></hr>
							<div class="container">
								<div class="fluid-row">
                        
                        <?php 
                            require_once ('PHP/DBConnection.php');
                            $sql = "SELECT Report, title,abstract,introduction,main,discussion,summary 
										FROM peersystem.reportbody 
										WHERE Report=2;";
                            
                            $result = $conn -> query($sql);
                            
                            if($result ->num_rows >0){
                            
                            	//Goes through each row in table
                            	while($row = $result ->fetch_assoc()){
                            		//$reportBody = $row["ReportBody"];
                            		$title = $row["title"];
                            		$abstract = $row["abstract"];
                            		$intro = $row["introduction"];
                            		$main = $row["main"];
                            		$discussion = $row["discussion"];
                            		$summary = $row["summary"];
                            
                            		echo "<b>Title:</b> $title"."<br>";
                            		echo "<b>Intro:</b> $intro"."<br>";
                            		echo "<b>Main:</b> $main"."<br>";
                            		echo "<b>Discussion:</b> $discussion"."<br>";
                            		echo "<b>Summary:</b> $summary"."<br><br>";
                            
                            	};
                            
                            	}
                            	
//                             	echo '<button  href="#gradeReport1" data-toggle="modal" data-target="#gradeReport1"
// 								class="btn btn-success">Grade</button>
//                         		<form action="PHP/submitGrade.php" method="POST" role="form">';
//                             	require_once ('PHP/gradeReportPopup.php');
//                             	echo '</form>';

			?>
	<!-- MODAL -->
									<!-- MODAL -->
									<!-- MODAL -->
									<!-- MODAL -->
									<!-- MODAL -->
									<!-- MODAL -->
									<!-- MODAL -->
									<!-- MODAL -->
									<!-- MODAL -->
									<!-- MODAL -->

								</div>
							</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row toggle" id="dropdown-detail-3"
							data-toggle="detail-3">
							<div class="col-xs-10">Group 3</div>
							<div class="col-xs-2">
								<i class="fa fa-chevron-down pull-right"></i>
							</div>
						</div>
						<div id="detail-3">
							<hr></hr>

						</div>
					</li>
				</ul>
			</div></div></div>
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