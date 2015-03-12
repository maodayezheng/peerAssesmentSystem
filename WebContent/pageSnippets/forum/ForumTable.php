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
    //if($result ->num_rows >0)
    //{
        while ($row = $result->fetch_assoc())
        {
            $threadID   = $row["threadID"];     // Will form a clickable link to display all of thread posts.
            $title      = $row["threadTitle"];
            $date       = $row["dateTimeCreated"];
            $author     = $row["threadAuthor"];

            include("viewThread.php");
            echo "<br /> After including viewthread";
            echo '<tr>
                <td colspan="2">
                    <a href="postPage.php?id=$threadID" target="_blank">' .$title.
                    '</a>
                </td>
              <td>' . $author . '</td>'
              .'<td>' . $date . '</td>
         </tr>';

        }
    }
//<a href="javascript:window.open('some.html', 'yourWindowName', 'width=200,height=150');">Test</a>

?>