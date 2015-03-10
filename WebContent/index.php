	<?php
	/*session_start ();
	if (! $_SESSION ['auth']) {
		header ( 'location:login.php' );
	}*/
	?>
	<?php
	include ("header.php");
	include ("navbar.php")?>


<div class="container">

	<!-- Jumbotron Header -->
	<header class="jumbotron hero-spacer">
		<h1>Welcome to Peer System!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa,
			ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid
			similique quaerat nam nobis illo aspernatur vitae fugiat numquam
			repellat.</p>
		<p>
			<a class="btn btn-primary btn-large">Call to action!</a>
		</p>
	</header>

	<hr>

	<!-- Title -->
	<div class="row">
		<div class="col-lg-12">
			<h3>You can...</h3>
		</div>
	</div>
	<!-- /.row -->

	<!-- Page Features -->
	<div class="row text-center">

		<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">

				<div class="caption">
					<h3>Submit Report</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>
						<a href="#" class="btn btn-primary">Submit Report</a> <a href="#"
							class="btn btn-default">More Info</a>
					</p>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">
				<div class="caption">
					<h3>View Report</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>
						<a href="#" class="btn btn-primary">View Report</a> <a href="#"
							class="btn btn-default">More Info</a>
					</p>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">
				<div class="caption">
					<h3>Ranking</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>
						<a href="#" class="btn btn-primary">View Ranking</a> <a href="#"
							class="btn btn-default">More Info</a>
					</p>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">
				<div class="caption">
					<h3>Grades</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>
						<a href="#" class="btn btn-primary">View Grades</a> <a href="#"
							class="btn btn-default">More Info</a>
					</p>
				</div>
			</div>
		</div>

	</div>
	<!-- /.row -->

	<hr>

	<!-- Footer -->
	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>Copyright &copy; Peer Systems 2015</p>
			</div>
		</div>
	</footer>

</div>
</html>