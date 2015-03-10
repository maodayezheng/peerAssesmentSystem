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

		<div class="col-md-6 col-sm-6 hero-feature">
			<div class="thumbnail">

				<div class="caption">
                    <p>
                        <a id="submit_group_report" class="btn btn-primary" onclick="Navigator.prototype.navigate(this.id)">
                            Submit Group Report
                        </a>
                    </p>
					<p>Upload a free text or XML report for your group. </p>
				</div>
			</div>
		</div>

        <div class="col-md-6 col-sm-6 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <p>
                        <a id="visit_the_forum" class="btn btn-primary" onclick="Navigator.prototype.navigate(this.id)">
                            Visit the Forum
                        </a>
                    </p>
                    <p> Create, browse and search threads in your exclusive group forum. </p>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <p>
                        <a id="view_results_and_ranking" class="btn btn-primary" onclick="Navigator.prototype.navigate(this.id)">
                            View Results and Ranking
                        </a>
                    </p>
                    <p>View assessments fn your report made by other groups. </p>
                    <p>View aggregated marks for your group and the others who assessed your report.</p>
                </div>
            </div>
        </div>





		<div class="col-md-6 col-sm-6 hero-feature">
			<div class="thumbnail">
				<div class="caption">
                    <p>
                        <a id="conduct_a_peerwise_assessment" class="btn btn-primary" onclick="Navigator.prototype.navigate(this.id)">
                            Conduct a Peerwise Assessment
                        </a>
                    </p>
					<p>Browse reports which your group has been allocated to review. </p>
                    <p>Submit your group's comments and grading on the reports assigned to you. </p>

				</div>
			</div>
		</div>

	</div>
	<!-- /.row -->



    <?php
    include ("footer.php");
    ?>

</div>
</html>