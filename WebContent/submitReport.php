	<?php
	include ("header.php");
	include ("navbar.php");
	?>
	<?php 
	?>

<div class="container">
	<div class="row row2">
		<?
		session_start ();
		echo '<br><div class="col-sm-12" >
           <b> <legend> Hello Group: ' . $_SESSION ['peergroup'] . '</legend>
        </div>';
		//echo $_SESSION["userName"];
		?>
        

		<div class="col-sm-5">
			<h4>Submit report:</h4>

			<div class="panel panel-default" align="center">
				<div class="panel-body form-horizontal">
					<div class="form-group" >
						Select a file to upload: <br />
						<form method="post" enctype="multipart/form-data"
							action="PHP/uploader.php">
							<table width="350" border="0" cellpadding="1" cellspacing="1"
								class="box" >
								<tr>
									<td width="246"><input type="hidden" name="MAX_FILE_SIZE"
										value="2000000"> <input name="userfile" type="file"
										id="userfile"></td>
									<td width="80"><input name="upload" type="submit" class="box btn-primary"
										id="upload" value=" Upload "></td>
								</tr>
							</table>
						</form>
					</div>
					
					<div class="form-group">
						Select an XML file to upload: <br />
						<form method="post" enctype="multipart/form-data"
							action="PHP/uploaderXML.php">
							<table width="350" border="0" cellpadding="1" cellspacing="1"
								class="box">
								<tr>
									<td width="246"><input type="hidden" name="MAX_FILE_SIZE"
										value="2000000"> <input name="userfile" type="file"
										id="userfile"></td>
									<td width="80"><input name="upload" type="submit" class="box btn-primary"
										id="upload" value=" Upload "></td>
								</tr>
							</table>
						</form>
					</div>

				</div>
			</div>
		</div>

		<!-- / panel preview -->
		<div class="col-sm-7">
			<h4>Preview Report:</h4>
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
						<table class="table preview-table">
						
						<?php
						require_once ('PHP/uploader.php');
						
						$peerGroup = $_SESSION ['peergroup'];
						$sql = "SELECT * FROM freetextreports WHERE id =$peerGroup";
						
						$result = $conn->query ( $sql );
						
						if ($result->num_rows > 0) {
							
							// Goes through each row in table
							while ( $row = $result->fetch_assoc () ) {
								$reportContent = $row ["reportcontent"];
								
								echo "<b>Report:</b><br><pre> $reportContent" . "</pre><br>";
								
								// if xml echo
							}
							;
						}
						
						?>

							<tbody></tbody>
							<!-- preview content goes here-->
						</table>
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










			<div class="row">
				<div class="col-xs-12">
					<hr style="border: 1px dashed #dddddd;">
					<button type="button" id="removeReport" class="btn-danger btn-primary btn-block">Remove
						Submission</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#removeReport').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'PHP/removeReport.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
        	window.location = 'PHP/removeReport.php';
        });
    });

});
</script>
</html>