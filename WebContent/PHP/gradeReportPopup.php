<form action="PHP/submitGrade.php" method="POST" role="form">
<div class="modal fade" id="gradeReport1" tabindex="-1" role="dialog"
	aria-labelledby="gradeReport" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Grade this report</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body"></div>
				<div class="form-group col-lg-4">
					<label>Content</label> <input type="text" name="reportComment"
						class="form-control" id="reportComment" value="" placeholder="comment">
				</div>

				<div class="form-group col-lg-4">
					<label>Style</label> <input type="text" name="reportComment1"
						class="form-control" id="reportComment1" value="" placeholder="comment">
				</div>
				<div class="form-group col-lg-4">
					<label>Delivery</label> <input type="text" name="reportComment2"
						class="form-control" id="reportComment2" value="" placeholder="comment">
				</div>
				<div>
					

					<div class="form-group col-lg-4">
						<label>Grade Content</label> <input type="number" name="reportGrade"
							class="form-control" id="reportGrade" value="" placeholder="0% - 100%">
					</div>

					<div class="form-group col-lg-4">
						<label>Grade Style</label> <input type="number" name="reportGrade1"
							class="form-control" id="reportGrade1" value="" placeholder="0% - 100%">
					</div>
					<div class="form-group col-lg-4">
						<label>Grade Delivery</label> <input type="number" name="reportGrade2"
							class="form-control" id="reportGrade2" value="" placeholder="0% - 100%">
					</div>
					<br>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>

			</div>
		</div>
	</div>
</div>
</form>