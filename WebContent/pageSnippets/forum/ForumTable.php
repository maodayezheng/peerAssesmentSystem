<?php
/**
 * This script's purpose is to populate the dynamic table which is shown on the forum page.
 * The table should show all of the threads for that group. Once a thread is clicked all posts related to that
 * thread should be displayed in an order ascending to the latest datetime.
 *
 * There should also be an option to 'add to thread' where the user can make another post in the thread.
 */

    /** This function is called in a while loop in this script to dynamically generate the HTML for each thread.
     *  The $includeThreadVariables array argument contains the dynamic content for each thread.
     *  include($file) has function scope, so using this defined function instead of
     *  simply using 'include' allows the $includeThreadVariables array to be accessed inside the include.
     */
    function includeThread($file, $includeThreadVariables) { include($file); }

    /** This function is called to dynamically create the new post button (which needs an ID containing the threadID).
     *  The $includeNewPostButtonVariables array contains the dynamic content which should be included in the generated HTML. */
    function includeNewPostButton($file, $includeNewPostButtonVariables) { include($file); }

    $userName       = $_SESSION["userName"];
    $groupNumber    = $_SESSION["peergroup"];

    $getGroupThreadsSQL = "SELECT * FROM forumthreads where `peergroup` =?";
    $preparedStatement = $conn->stmt_init();
    $preparedStatement = $conn->prepare($getGroupThreadsSQL);
    $preparedStatement->bind_param('i', $groupNumber); // i because $groupNumber should be an integer. 
    $preparedStatement->execute();

    $result = $preparedStatement -> get_result();

    //In $result === false then no results were found
    if ( ($result === FALSE) || ($result->num_rows === 0) )
    {
        echo '<tr>
                <td colspan="2" style="text-align: left; font-size: 20px;">
                     Your group\'s forum is currently empty. <br />
                     Click "Create a thread" to start posting!
                </td>
              </tr>';
    } else
    {
        while ($row = $result->fetch_assoc())
        {
            // Columns in forumthreads table: (threadID, peergroup, threadTitle, threadAuthor, dateTimeCreated)
            $threadVariables = array
            (
                "threadID"          => $row["threadID"],
                "threadTitle"       => $row["threadTitle"],
                "threadDate"        => $row["dateTimeCreated"],
                "threadAuthor"      => $row["threadAuthor"]
            );

            echo '<tr>
                    <td colspan="2">';
                        // The $threadVariables array allows the include script to have access
                        // to all of the information needed to dynamically generate the HTML.
                        includeThread("viewThread.php", $threadVariables);

            echo   '</td>
                </tr>';

        }
    }





?>