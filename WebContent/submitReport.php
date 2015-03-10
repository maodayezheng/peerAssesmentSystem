	<?php
	include ("header.php");
	include ("navbar.php");
	?>
	<?php 
// 	//require_once ('PHP/DBConnection.php');
// 	//Connect to db
// 	$mysqli = new $MySQLi('eu-cdbr-azure-west-b.cloudapp.net','b41c1a25cb18b9','67705167');
	
// 	$reslutSet = $mysqli->query("SELECT * FROM reportbody");
	
// 	//count returned rows
// 	if($resultSet->num_rows !=0){
// 		echo "found";
// 	} else {
// 		echo "no results";
// 	}
	
// 	?>

<div class="container">
	<div class="row">
        <div class="col-sm-12">
            <legend>Mr. Eric Cartman:</legend>
        </div>
        <!-- panel preview -->
        <div class="col-sm-5">
            <h4>Submit report:</h4>
            <form action="PHP/submitFreeTextReport.php" method="POST" role="form">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                <div class="form-group">
                        <label for="concept" class="col-sm-3 control-label">Group Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="groupNumber" name="groupNumber" maxlength="2" size="4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="concept" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titleReport" name="titleReport">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Abstract</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="abstractReport" name="abstractReport">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Intro</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="introReport" name="introReport">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Main</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mainReport" name="mainReport">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Discussion</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="discussionReport" name="discussionReport">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Summary</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="summaryReport" name="summaryReport">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-success preview-add-button">
                                <span class="glyphicon glyphicon-plus"></span> Submit
                            </button>
                            
                        </div>
                    </div>
                   
                </div>
            </div>  
             </form>  
            
            
            
            

				
				
            
            
            
            
                    
        </div> <!-- / panel preview -->
        <div class="col-sm-7">
            <h4>Preview Report:</h4>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table preview-table">
                           
                            <tbody></tbody> <!-- preview content goes here-->
                        </table>
                    </div>                            
                </div>
            </div>
            
            
            
            
            
            
            
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

	<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Select a group below to view their report</h3>
        </div>   
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-1" data-toggle="detail-1">
                    <div class="col-xs-10">
                        Group 1
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
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
                            ?>
                                
                        
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-2" data-toggle="detail-2">
                    <div class="col-xs-10">
                        Group 2
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-2">
                    <hr></hr>
                    <div class="container">
                        <div class="fluid-row">
                         
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-3" data-toggle="detail-3">
                    <div class="col-xs-10">
                        Group 3
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-3">
                    <hr></hr>
                    
                </div>
            </li>
        </ul>
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
            
            
            
            
            
            
            
            
            
            
            <div class="row">
                <div class="col-xs-12">
                    <hr style="border:1px dashed #dddddd;">
                    <button type="button" class="btn-danger btn-primary btn-block">Remove Submission</button>
                </div>                
            </div>
        </div>
	</div>
</div>
</html>