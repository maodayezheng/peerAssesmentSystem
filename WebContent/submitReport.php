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
					<div class="panel-body form-horizontal payment-form">
						<div class="form-group">
							<label for="concept" class="col-sm-3 control-label">Group Number</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="groupNumber"
									name="groupNumber" maxlength="2" size="4">
							</div>
						</div>
						<div class="form-group">
							<label for="concept" class="col-sm-3 control-label">Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="titleReport"
									name="titleReport">
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-sm-3 control-label">Abstract</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="abstractReport"
									name="abstractReport">
							</div>
						</div>
						<div class="form-group">
							<label for="amount" class="col-sm-3 control-label">Intro</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="introReport"
									name="introReport">
							</div>
						</div>
						<div class="form-group">
							<label for="amount" class="col-sm-3 control-label">Main</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="mainReport"
									name="mainReport">
							</div>
						</div>
						<div class="form-group">
							<label for="amount" class="col-sm-3 control-label">Discussion</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="discussionReport"
									name="discussionReport">
							</div>
						</div>
						<div class="form-group">
							<label for="amount" class="col-sm-3 control-label">Summary</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="summaryReport"
									name="summaryReport">
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
		<!-- / panel preview -->
		<div class="col-sm-7">
			<h4>Preview Report:</h4>
			<div class="row">
				<div class="col-xs-12">
					<div class="table-responsive">
						<table class="table preview-table">

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