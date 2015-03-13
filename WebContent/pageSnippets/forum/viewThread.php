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

                <style type="text/css">
                    .tg  {border-collapse:collapse;border-spacing:0; width: 100%}
                    .tg td{font-family:Arial, sans-serif; font-size:14px; padding:10px 5px;
                        border: 1px solid #ddd; overflow:hidden;word-break:normal;}
                    .tg th{text-align: center; font-family:Arial, sans-serif; font-size:14px; font-weight:normal; padding:10px 5px;
                        border: 1px solid #ddd; background-color: #f5f5f5;
                        color: #333; overflow:hidden; word-break:normal;}
                </style>
                <table class="tg">
<?php
    /* The following code generates what is displayed as the body for the thread.
     * The thread is implemented as a table with each row being a post.
     * Each post is itself a table with two rows and two columns as per the illustration below:
     *  Table
     *      row -> Post
     *                  row -> Post Author: $variable["threadAuthor"] Post Date: $variable["threadDate"]
     *                  row -> Post Content (Colspan 2)
     */

    // Run query to get all of the posts made in this thread.

    echo "<tr>
              <th>Post Author:</td>
              <th>Post Date:</td>
         </tr>
         <tr>
                <td colspan=\"2\">
                    Insert the post body here
                </td>
         </tr>";

?>
                </table>


            </div>
        </div>
    </div>


</div>
