<?php
/**
 * This script's purpose is to populate the dynamic table which is shown on the forum page.
 * The table should show all of the threads for that group. Once a thread is clicked all posts related to that
 * thread should be displayed in an order ascending to the latest datetime.
 *
 * There should also be an option to 'add to thread' where the user can make another post in the thread.
 */

    //require_once ("../../PHP/DBConnection.php");
    $userName       = $_SESSION["userName"];
    $groupNumber    = $_SESSION["peergroup"];

    $getGroupThreadsSQL = "SELECT * FROM forumthreads where `peergroup` ='$groupNumber'";

    $result = $conn -> query($getGroupThreadsSQL);

    // Columns in forumthreads table: (threadID, peergroup, threadTitle, threadAuthor, dateTimeCreated)

    //In $result === false then no results were found
    if ($result === FALSE )
    {
        echo '<tr>
                <td colspan="4">
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
                    <td>';
                    includefile("viewThread.php", $threadVariables);
            echo    '</tr>';

        }
    }
//<a href="javascript:window.open('some.html', 'yourWindowName', 'width=200,height=150');">Test</a>

/*
 * includeFile allows you to pass the file you would like to include and an array of variables
 * you would like the file included to have access to. This is because includes have function scope.
 */
function includeFile($file, $variables)
{
    include($file);
}


?>