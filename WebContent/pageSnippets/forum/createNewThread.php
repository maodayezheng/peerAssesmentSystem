<?php
/**
 * This script's purpose is to create a new thread in the database.
 * For correct execution the forum page must require init.php
 */
    require ("../../PHP/DBConnection.php");
    // get the post information
    session_start();
    $userName       = $_SESSION["userName"];
    $groupNumber    = $_SESSION["peergroup"];
    $threadTitle    = $_POST ['title'];
    $content        = $_POST ['content'];
    $date           = date("Y-m-d h:i:s");

    // Insert the new thread into the forumThreads table.
    $insertThreadSQL = "INSERT INTO forumthreads (peergroup, threadTitle, threadAuthor, dateTimeCreated)
                    VALUES ('$groupNumber','$threadTitle','$userName', '$date')"; //groupNumber and userName defined in init.php

    // Given that a post can only exist if a thread does we need to retrieve the auto-incremented
    // thread ID from the DB before storing the $content in the forumposts table.

    if ($conn->query($insertThreadSQL) === true)
    { // In this case the query executed successfully.

        // Writing and executing a SQL query to get the threadID of the newly created thread.
        $getThreadID = "SELECT threadID
                        FROM forumthreads
                        WHERE peergroup='$groupNumber'
                        AND threadTitle='$threadTitle'
                        AND threadAuthor='$userName'
                        AND dateTimeCreated='$date'";

        $results    = $conn->query($getThreadID);
        $threadID   = null;

        // There will only be one row returned so set the threadID variable to it.
        while($row = $results->fetch_assoc()) { $threadID = $row["threadID"]; }

        // Now insert the content in the forumposts table.
        if($threadID)
        {
            $insertPostSQL = "INSERT INTO forumposts (threadID, author, date, content)
                           VALUES ('$threadID', '$userName', '$date', '$content')";

            if($conn->query($insertPostSQL) === true)
            {
                header('location: ../../forumPage.php');
            }
            else
            {
                echo "<script> alert('Inserting your thread\'s content into the database failed'); </script>";
                header('location: ../../forumPage.php');
            }

        }
    } else
    {
        echo "<script> alert('Inserting into the database failed'); </script>";
    }


?>