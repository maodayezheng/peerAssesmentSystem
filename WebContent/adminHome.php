	<?php
	/*session_start ();
	if (! $_SESSION ['']) {
		header ( 'location:login.php' );
	}*/
	?>
	<?php
	session_start();
    include ("header.php");
	include ("navbar.php");
    require ("PHP/coreFunctions.php");

    if(!userIsAdmin())
    {
        endScript('You do not have permission to view this page. ');
    }

?>
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


	<!-- Page Features -->
	<div class="row text-center">

		<div class="col-md-6 col-sm-6 hero-feature">
			<div class="thumbnail">

				<div class="caption">
                    <p>
                       <script>
						function jumpToAdmin(){

							window.location.href = "admin.php";

							}
                        </script>
                        <a class="btn btn-primary" onclick="jumpToAdmin()">
                            Manage Students
                        </a>
                    </p>
					<p>Allocate students to different groups</p>
				</div>
			</div>
		</div>

        <div class="col-md-6 col-sm-6 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <p>
                     <script>
						function jumpToAssign(){

							window.location.href = "assignReport.php";

							}
                        </script>
                        <a class="btn btn-primary" onclick="jumpToAssign()">
                            Manage Group 
                        </a>
                    </p>
                    <p> Assign a group to mark another group's report.  </p>
                </div>
            </div>
        </div>
	</div>
	
	<!-- /.row -->
	
	<div class="row text-center">

		<div class="col-md-6 col-sm-6 hero-feature">
			<div class="thumbnail">

				<div class="caption">
                    <p>
                       <script>
						function jumpToSearch(){

							window.location.href = "searchForStudent.php";

							}
                        </script>
                        <a class="btn btn-primary" onclick="jumpToSearch()">
                            Search for a student
                        </a>
                    </p>
					<p>Search for a student and view their details. </p>
				</div>
			</div>
		</div>

        <div class="col-md-6 col-sm-6 hero-feature">
            <div class="thumbnail">
                <div class="caption">
                    <p>
                     <script>
						function jumpToViewRanking(){
							
							window.location.href = "viewGroupRanking.php";

							}
                        </script>
                        <a class="btn btn-primary" onclick="jumpToViewRanking()">
                            View Group Rankings
                        </a>
                    </p>
                    <p> View a ranking of groups according to their grade aggregation. </p>
                </div>
            </div>
        </div>
	</div>
	
    <?php
    include ("footer.php");
    ?>

</div>
</html>