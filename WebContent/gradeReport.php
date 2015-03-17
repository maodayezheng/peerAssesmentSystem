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
                        $marker= $_SESSION['peergroup'];
                        $sql = "SELECT groupAssessed FROM assesments WHERE assignedMarker ='$marker';";
                        $result = $conn -> query($sql);
                            
                            if($result ->num_rows >0){
                            
                            	//Goes through each row in table
                            	while($row = $result ->fetch_assoc()){
                            		echo "<li class=\"list-group-item\">";
                            		echo "<div class=\"row toggle\" id=\"dropdown-detail-2\" data-toggle=\"detail-2\">";
                            		$report = $row['groupAssessed'];
									echo "<div class=\"col-xs-10\">Group $report</div>";
									echo "</div>";
									echo "";
                            		$sql = "SELECT content FROM freetextreprots WHERE id=$report";
                            		
                            		$result = $conn -> query($sql);
                            		
                            		if($result ->num_rows >0){
                            		while($row = $result ->fetch_assoc()){
                            			$report = $row["content"];
                            		echo "<b>Report: <br><br></b> <pre>$report</pre>"."<br>";
                            			}
                            		}
                            	
                            	echo "</li>";
                            	}
                            }																	
																											// form for grading + comments
	echo '<br><br>';?>
			
			
			<div class="col-xs-2">
			<i class="fa fa-chevron-down pull-right"></i>
			</div>
			</div>
            </li>           
                       
	
	<?php 
	echo ' <div class="row">
  <form class="form-horizontal">
    <div class="span6">
      <fieldset>
      <legend> Grade the report below</legend>
      <div class="control-group">
       
        <div class="col-md-4">
          <input type="number" class="input-xlarge" id="input01" placeholder= " %">
          <p class="help-block">Content</p>
        </div>
									<div class="col-md-4">
          <input type="number" class="input-xlarge" id="input01" placeholder= " %">
          <p class="help-block">Style </p>
        </div>
									<div class="col-md-4">
          <input type="number" class="input-xlarge" id="input01" placeholder= " %">
          <p class="help-block">Sources</p>
        </div>
									
      </div>
      </fieldset>
    </div>
    <div class="span6">
        <fieldset>
      <legend> Comment on the report below</legend>
      <div class="control-group">
       
        <div class="col-md-4">
          <input type="text" class="input-xlarge" id="input01">
          <p class="help-block">Content</p>
        </div>
									<div class="col-md-4">
          <input type="text" class="input-xlarge" id="input01">
          <p class="help-block">Style</p>
        </div>
									<div class="col-md-4">
          <input type="text" class="input-xlarge" id="input01">
          <p class="help-block">Sources</p>
        </div>
									
      </div>
      </fieldset>
    </div>
 <br><br><div class="col-md-4"></div>	<div class="col-md-6"><input align="right" type="submit" class="foo col-xs-3 input-xlarge btn-success" id="submitAssessment"></div>
  </form>
</div>';
 	
 	

                            		
							//anything above THIS POINT is in view report content
                            		echo '</div>
						</div>
					</div>
				</li>';
                            		
                            
                            	
                            
                            	
                            	

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