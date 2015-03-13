<?php
	require_once ("PHP/init.php");
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
						<th style="text-align: center; font-size: 20px; width: 80%" >
                            Forum Threads</th>
                        <th style="text-align: center; font-size: 20px; width: 20%">
                            <?php include("pageSnippets/forum/createNewThreadButton.html"); ?>
                        </th>
					</tr>
				</thead>
				<tbody>
				    <?php include ("pageSnippets/forum/ForumTable.php")?>
				</tbody>
			</table>





		</div>
	</div>
</div>
</html>