	<?php
	include ("header.php");
	include ("navbar.php");
	?>
	<?php 
	?>

<div class="container">
	<div class="row">
		<?
		session_start ();
		echo '<div class="col-sm-12">
            <legend> Hello Group: ' . $_SESSION ['peergroup'] . '</legend>
        </div>';
		?>
        
        <!-- panel preview -->
		<div class="col-sm-5">
			<h4>Submit report:</h4>
			<form action="PHP/submitFreeTextReport.php" method="POST" role="form">
				<div class="panel panel-default">
					<div class="panel-body form-horizontal">
						<div class="form-group">
							<label for="concept" class="col-sm-3 control-label">Group Number</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="groupNumber"
									name="groupNumber" maxlength="2" size="4">
							</div>
						</div>
						<div class="form-group">
							<label for="concept" class="col-sm-3 control-label">Paste Report</label>
							<div class="col-sm-9">

								<textarea rows="4" cols="30" type="text" class="form-control"
									id="pasteReport" name="pasteReport"></textarea>
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


		</div>

		<div class="col-sm-5">
			<h4>Submit report:</h4>

			<div class="panel panel-default">
				<div class="panel-body form-horizontal">
					<div class="form-group">
						Select a file to upload: <br />
						<form method="post" enctype="multipart/form-data"
							action="PHP/uploader.php">
							<table width="350" border="0" cellpadding="1" cellspacing="1"
								class="box">
								<tr>
									<td width="246"><input type="hidden" name="MAX_FILE_SIZE"
										value="2000000"> <input name="userfile" type="file"
										id="userfile"></td>
									<td width="80"><input name="upload" type="submit" class="box"
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
						
						
$sql = "SELECT * FROM reportbody WHERE Report =2";

$result = $conn -> query($sql);

if($result ->num_rows >0){
	
	//Goes through each row in table
		while($row = $result ->fetch_assoc()){
			$reportContent = $row["ReportContent"];
			

			echo "<b>Report:</b><br><pre> $reportContent"."</pre><br>";
 
		
	};

}
						
						
						?>

							<tbody></tbody>
							<!-- preview content goes here-->
						</table>
					</div>
				</div>
			</div>







			<link rel="stylesheet"
				href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">




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
					<button type="button" class="btn-danger btn-primary btn-block">Remove
						Submission</button>
				</div>
			</div>
		</div>
	</div>
</div>
</html>