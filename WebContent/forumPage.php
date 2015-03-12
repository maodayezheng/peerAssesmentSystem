<?php
	require ("PHP/init.php");
    include ("header.php");
	include ("navbar.php")
?>


<div class="container" style="margin-top: 60px">
    <div class="panel panel-primary">
		<div class="panel-heading">
            <?php
                echo "Welcome {$userName} to Group {$groupNumber}'s Discussion Forum";
            ?>
        </div>

        <div class="panel-body">

            <!-- Table containing each thread for the group. -->
            <table class="table table-striped table-hover">
				<thead>
					<tr>
						<th colspan="2">Thread Title</th>
						<th>Author</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
				    <?php include ("pageSnippets/forum/ForumTable.php")?>
				</tbody>
			</table>




            <!-- Pop up box when creating a new thread -->
			<a href="#postForum" data-toggle="modal" data-target="#postForum"
				class="btn btn-primary btn-bg pull-right">Create New Thread</a>
				
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
										<b>Thread Title:</b>
									</h4>
									<input name="title" id="title" max="50" rows="1"
										cols="50" placeholder="Title:">
									<br>
								</div>

								<div>
									<h4>
										<b>Content:</b>
									</h4>
									<input name="content" id="content" max="10000"
										rows="5" cols="50" placeholder="Write your post here">
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