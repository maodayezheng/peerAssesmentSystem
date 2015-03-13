<?php
/**
 * This script's purpose is to populate the dynamic table which is shown on the forum page.
 * The table should show all of the threads for that group. Once a thread is clicked all posts related to that
 * thread should be displayed in an order ascending to the latest datetime.
 *
 * There should also be an option to 'add to thread' where the user can make another post in the thread.
 */


    /** This function is called in a while loop to dynamically generate HTML for each thread.
     *  The $includeThreadVariables array contains the dynamic content for each thread.
     *  include($file) has function scope, so using this defined function instead of
     *  simply using 'include' allows an array of variables to be accessed in the included script.
     */
    function includeThread($file, $includeThreadVariables) { include($file); }

    /** This function is called to dynamically create the new post button.
     *  The $includeNewPostButtonVariables array contains the dynamic content (the threadID). */
    function includeNewPostButton($file, $includeNewPostButtonVariables) { include($file); }

    $userName       = $_SESSION["userName"];
    $groupNumber    = $_SESSION["peergroup"];

    $getGroupThreadsSQL = "SELECT * FROM forumthreads where `peergroup` ='$groupNumber'";

    $result = $conn -> query($getGroupThreadsSQL);

    // Columns in forumthreads table: (threadID, peergroup, threadTitle, threadAuthor, dateTimeCreated)

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
            $threadVariables = array
            (
                "threadID"  => $row["threadID"],
                "threadTitle"     => $row["threadTitle"],
                "threadDate"      => $row["dateTimeCreated"],
                "threadAuthor"    => $row["threadAuthor"]
            );

            echo '<tr>
                    <td colspan="2">';

                        includeThread("viewThread.php", $threadVariables);

            echo   '</td>
                </tr>';

        }
    }





?>