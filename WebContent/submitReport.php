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
                            <thead>
                                <tr>
                                    <th>Abstract</th>
                                    <th>Intro</th>
                                    <th>Main</th>
                                    <th>Discussion</th>
                                    <th>Summary</th>
                                </tr>
                            </thead>
                            <tbody></tbody> <!-- preview content goes here-->
                        </table>
                    </div>                            
                </div>
            </div>
            <?php include ("PHP/displayReports.php")?>
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