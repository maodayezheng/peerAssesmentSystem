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
		<!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa,
			ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid
			similique quaerat nam nobis illo aspernatur vitae fugiat numquam
			repellat.</p>
		<p>
			<a class="btn btn-primary btn-large">Call to action!</a>
		</p>-->
	</header>

	<hr>

	<!-- Title -->
	<div class="row">
		<div class="col-lg-12">
			<h3><em>You can...</em></h3>
		</div>
	</div>
	<!-- /.row -->

	<!-- Page Features -->
	<div class="row text-center">

		<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">

				<div class="caption">
					<h3>Submit Group Report</h3>
					<p>Upload a free text or XML report for your group. </p>
					<p>
						<a href="#" class="btn btn-primary">Submit Report</a>
					</p>
				</div>
			</div>
		</div>


        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <h3>View Results and Ranking</h3>
                    <p>View assessments on your report made by other groups. </p>
                    <p>View the ranking of your aggregated mark within the aggregated marks for all groups.</p>
                    <p>View the aggregated assessment grades received by each group that provided a mark for your report. </p>
                    <p>
                        <a href="#" class="btn btn-primary">View Ranking</a>
                    </p>
                </div>
            </div>
        </div>

		<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">
				<div class="caption">
					<h3>Visit the Forum</h3>
					<p> Create, browse and search threads in your exclusive group forum. </p>
					<p>
						<a href="#" class="btn btn-primary">View Forum</a>
					</p>
				</div>
			</div>
		</div>



		<div class="col-md-3 col-sm-6 hero-feature">
			<div class="thumbnail">
				<div class="caption">
					<h3>Conduct a Peerwise Assessment</h3>
					<p>Browse group reports which your group has been allocated to review. </p>
                    <p>Submit your group's comments and grading on the reports assigned to you. </p>
					<p>
						<a href="#" class="btn btn-primary">Assess</a>
							
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