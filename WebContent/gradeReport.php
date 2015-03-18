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
                        
                        $sql = "SELECT a.*, ftr.*
								FROM (assesments AS a INNER JOIN freetextreports AS ftr 
								ON a.groupAssessed = ftr.id)
								WHERE a.assignedMarker=$marker;";
                        
       
                            
                            $result = $conn -> query($sql);
                            
                            if($result ->num_rows >0){
                            
                            	//Goes through each row in table
                            	while($row = $result ->fetch_assoc()){
                            		
                            		$tomark = $row['groupAssessed'];
                            		$reportContent = $row['reportcontent'];
                            		$id = $row['id'];
                            		echo '<li class="list-group-item">';  // title
                            		echo "<div class=\"row toggle\" id=\"dropdown-detail-$tomark\" data-toggle=\"detail-$tomark\">";
                            		echo '<div class="col-xs-10">'.'Group '.$tomark.'</div>';
                            		echo '</div>'; // close title
                            		
                            		echo "<div id=\"detail-$tomark\">";
                            		echo '<hr></hr>';
                            		echo '<div class="container">';
                            		echo '<div class="fluid-row">';
                            		echo "<b>Report: <br><br></b><pre>$reportContent</pre>"."<br>";
                            		echo '</div>';// close report content 
                            		
                            		echo "<br><br>";
                            		
                            		echo "<div class=\"row\">"; // assesment fields
                            		echo '<form class="form-horizontal" method="POST" action="PHP/submitAssesment.php">';
                            		
                            		echo '<div class="span6">'; // grade field
                            		echo '<fieldset>';
                            		echo '<legend> Grade the report below</legend>';
                            		echo '<div class="control-group">';
                            		echo '<div class="col-md-4">'; // content 
                            		echo '<input type="number" class="input-xlarge" name="content-grade" placeholder= " %">';
                            		echo '<p class="help-block">Content</p>';
                            		echo '</div>';
                            		echo '<div class="col-md-4">'; // style
                            		echo '<input type="number" class="input-xlarge" name="style-grade" placeholder= " %">';
                            		echo '<p class="help-block">Style </p>';
                            		echo '</div>';
                            		echo '<div class="col-md-4">'; // source
                            		echo '<input type="number" class="input-xlarge" name="source-grade" placeholder= " %">';
                            		echo '<p class="help-block">Sources</p>';
                            		echo '</div>';
                            		echo '</div>';	
                            		echo '</fieldset>';
                            		echo '</div>';  // close grade field
                            		
                            		echo  '<div class="span6">';
        							echo  '<fieldset>';
      								echo  '<legend> Comment on the report below</legend>';
      								echo  '<div class="control-group">';
       
        							echo  '<div class="col-md-4">';
          							echo  '<input type="text" class="input-xlarge" name="content-comment">';
          							echo  '<p class="help-block">Content</p>';
            						echo  '</div>';
									echo  '<div class="col-md-4">';
          							echo  '<input type="text" class="input-xlarge" name="style-comment">';
            						echo  '<p class="help-block">Style</p>';
        							echo  '</div>';
									echo  '<div class="col-md-4">';
               						echo  '<input type="text" class="input-xlarge" name="source-comment">';
          							echo  '<p class="help-block">Sources</p>';
        							echo  '</div>';
									
      								echo  '</div>';
      								echo  '</fieldset>';
    								echo  '</div>';
    								echo "<div class=\"col-md-offset-4 col-md-6\">
        								  <button align=\"right\" type=\"submit\" class=\"foo col-xs-3 input-xlarge btn-success\" value=$id name=\"id\">
        								submit
        								</button>		
    								</div>";
                            		echo '</form>';
                            		
                            		echo '</div>';// close container 
                            		echo '</div>';// close collapse
                            		echo '</li>';
                            		
                            
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