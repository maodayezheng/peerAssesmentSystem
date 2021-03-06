
		<?php
        require ("PHP/init.php");
        include ("header.php");
	    include ("navbar.php");
        require ("PHP/coreFunctions.php");

        if(!userHasPeerGroup())
        {
            userPeerGroupNotSet('Your account is currently pending assignment to a group by an administrator.');
        }

        ?>
<div class="container">

	<!-- Jumbotron Header -->
	<header class="jumbotron hero-spacer">
		<h1>Welcome to Peer System!</h1>
		<h4> "Collaborate for better results"</h4>
	</header>

	<hr>

	<!-- Title -->
	<div class="row">
		<div class="col-lg-12">
			<b><h3 style="color:white"><em>You can...</em></h3></b>
		</div>
	</div>
	<!-- /.row -->

	<!-- Page Features -->
	<div class="row text-center">

		<div class="col-md-6 col-sm-6 hero-feature">
			<div class="thumbnail">
			
			<!--  -->

				<div class="caption">
                    <p>
                        <a id="submit_group_report" class="btn btn-primary" onclick="Navigator.prototype.navigate(this.id)">
                            Submit / View Group Report
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
                    <p>View assessments of your report made by other groups. </p>
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
	
