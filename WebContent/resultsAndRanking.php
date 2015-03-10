<?php

    include ("header.php");
    include ("navbar.php");

?>

<div class="container">
    <div role="tabpanel">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#assessment_results" aria-controls="assessment_results" role="tab" data-toggle="tab">
                    Assessment Results </a></li>
            <li role="presentation">
                <a href="#ranking" aria-controls="ranking" role="tab" data-toggle="tab">
                    Ranking</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="assessment_results">

                <?php
                    include("pageSnippets/resultsAndRanking/assessmentResultsTab.php");
                ?>


            </div>
            <div role="tabpanel" class="tab-pane" id="ranking">
                <p> INSERT DYNAMICALLY GENERATED TABLE WHICH SHOWS THE AGGREGATED MARK OF THE GROUP AS
                    WELL AS THE AGGREGATED MARK OF THE GROUPS WHICH MARKED THE REPORT.
                    The group's own grade should have a row of a different colour to easily identify it.
                </p>
            </div>
          </div>

    </div>

    <?php
        include ("footer.php");
    ?>

</div>
</html>