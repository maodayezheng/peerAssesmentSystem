<?php
/*
 * This file generates the HTML to encapsulate a single thread.
 *      A single thread contains all of the posts in an order ascending to the latest.
 *      It also contains the option to add another post.
 *
 * It is intended to be included in a file using the following function:
 *      function includeFile($file, $variables) { include($file); }
 * By using the includeFile function we can pass an array of variables ($variables)
 * which this script has access to (such as the threadTitle, author etc.).
 *
 * This is possible because the built-in include() function has function scope.
 *
 * "threadID", "threadTitle", "threadDate", "threadAuthor" are the keys available in the
 * $variables associative array.
 *
 */

?>

<div class="panel-group" id="accordion">
    <!-- Panel 1 -->
    <div class="panel panel-default" id="panel<?php echo $variables["threadID"]; ?>">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-target="#collapse<?php echo $variables["threadID"]; ?>"
                   href="#<?php echo $variables["threadID"]; ?>" class="collapsed">
                    <?php echo $variables["threadTitle"]; ?>
                </a>
            </h4>
        </div>
        <div id="collapse<?php echo $variables["threadID"]; ?>" class="panel-collapse collapse">
            <div class="panel-body">
                <p> Enter information from the database about the group's assessment here.</p>
            </div>
        </div>
    </div>


</div>




<!-- Panel 2 Example -->
<!--<div class="panel panel-default" id="panel2">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-target="#collapseTwo" href="#collapseTwo" class="collapsed">
                Group <b> ??'s </b> Assessment
            </a>
        </h4>
    </div>

    <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
            <p> Enter information from the database about the group's assessment here.</p>
        </div>
    </div>
</div>

<!-- Panel 3 Example -->
<!--<div class="panel panel-default" id="panel3">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-target="#collapseThree"
               href="#collapseThree" class="collapsed">
                Group <b> ??'s </b> Assessment
            </a>
        </h4>
    </div>

    <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
            <p> Enter information from the database about the group's assessment here.</p>
        </div>
    </div>
</div>-->
