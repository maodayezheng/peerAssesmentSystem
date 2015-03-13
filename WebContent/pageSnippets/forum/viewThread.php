<?php
/*
 * This file generates the HTML to encapsulate a single thread.
 *      A single thread contains all of the posts in an order from oldest to newest.
 *      It also contains the option to add another post.
 *
 * It is intended to be included in a file using the following function:
 *      function includeFile($file, $variables) { include($file); }
 * By using the includeFile defined as above we can pass an array of variables ($variables)
 * which this script has access to (such as the threadTitle, author etc.).
 *
 * This is possible because the built-in include() function has function scope.
 *
 * "threadID", "threadTitle", "threadDate", "threadAuthor" are the keys available in the
 * $variables associative array which is passed to this script.
 *
 */

    // $newPostVariables is passed to the includeFile function as the second argument later in this script.
    // This is because the threadID is needed to dynamically generate content delegated to that script.
    $newPostVariables = array
    (
        "threadID" => $variablesPassedToInclude["threadID"]
    );
?>

<div class="panel-group" id="accordion">
    <!-- Panel 1 -->
    <div class="panel panel-default" id="panel<?php echo $variablesPassedToInclude["threadID"]; ?>">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-target="#collapse<?php echo $variablesPassedToInclude["threadID"]; ?>"
                   href="#<?php echo $variablesPassedToInclude["threadID"]; ?>" class="collapsed">
                    <?php echo $variablesPassedToInclude["threadTitle"]; ?>
                </a>
            </h4>
        </div>
        <div id="collapse<?php echo $variablesPassedToInclude["threadID"]; ?>" class="panel-collapse collapse">
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
                    <thead>
                    <tr>
                        <th colspan="2" style="text-align: center; font-size: 20px; width: 20%">
                            <?php includeFile("pageSnippets/forum/createNewPost.php", $newPostVariables); ?>
                        </th>
                    </tr>
                    </thead>


<?php
    require ('PHP/DBConnection.php');


    // Run query to get all of the posts made in this thread.
    $getAllPostsInThreadSQL = 'SELECT * FROM forumposts WHERE threadID='.$variablesPassedToInclude["threadID"]."
                               ORDER BY `date` ASC";

    $result = $conn -> query($getAllPostsInThreadSQL);

    if ($result === FALSE || ($result->num_rows === 0))
    {
        echo '<tr>
                    <td colspan="2">
                         No Posts In This Thread
                    </td>
                  </tr>';
    } else
    {
        while ($row = $result->fetch_assoc())
        {
            $threadPost = array
            (
                "postAuthor"    => $row["author"],
                "postDate"      => $row["date"],
                "postContent"   => $row["content"]

            );

            // Echo out each post to the table
            echo "<tr>
                      <th><b>Post Author:</b> <i>".$threadPost["postAuthor"]."  </i></td>
                      <th><b>Post Date:</b>   <i>". $threadPost["postDate"]."   </i></td>
                 </tr>
                 <tr>
                        <td colspan=\"2\">"
                            .$threadPost["postContent"].
                        "</td>
                 </tr>";
        }
    }
?>


                </table>
            </div>
        </div>
    </div>


</div>
