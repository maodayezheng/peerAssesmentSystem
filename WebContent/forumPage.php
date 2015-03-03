	<?php
	include ("header.php");
	include ("navbar.php")?>
<div class="container" style="margin-top: 60px">
	<div class="panel panel-primary">
		<div class="panel-heading">Forum Page</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th colspan="2">Title</th>
						<th>Content</th>
						<th>Date</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="2">Stuck on Q3</td>
						<td>MIPS is hard</td>
						<td>23/1/15</td>
					</tr>
					<tr>
						<td colspan="2">Great lecture from Dean</td>
						<td>Dean is on top of his game</td>
						<td>23/1/15</td>
					</tr>
				</tbody>
			</table>
			<a href="#postForum" data-toggle="modal" data-target="#postForum"
				class="btn btn-primary btn-bg pull-right">Post</a>
				
				<form action="PHP/submitForum.php" method="POST" role="form">

			<div class="modal fade" id="postForum" tabindex="-1" role="dialog"
				aria-labelledby="postForum" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Post to Forum</h4>
						</div>
						<div class="modal-body">
							<div class="panel-body">

								<div>
									<h4>
										<b>Title:</b>
									</h4>
									<input name="titleForum" id="titleForum" max="50" rows="1"
										cols="50" placeholder="Title:"></input>
									<br>
								</div>

								<div>
									<h4>
										<b>Content:</b>
									</h4>
									<input name="contentForum" id="contentForum" max="10000"
										rows="5" cols="50" placeholder="Write your post here"></input>
									<br>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
								data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success"
								>Submit</button>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</html>