<?php
/**
 * This script's purpose is to create a new thread in the database.
 * For correct execution the forum page must require init.php
 */
    require_once("../../../PHP/DBConnection.php");
    // get the post information
    session_start();
    $userName       = $_SESSION["userName"];
    $groupNumber    = $_SESSION["peergroup"];
    $threadTitle    = $_POST ['title'];
    $content        = $_POST ['content'];
    $date           = date("Y-m-d H:i:s");

    // Insert the new thread into the forumThreads table.
    $insertThreadSQL = "INSERT INTO forumthreads (peergroup, threadTitle, threadAuthor, dateTimeCreated) VALUES (?, ?, ?, ?)";
    $preparedStatement  = $conn->stmt_init();
    $preparedStatement  = $conn->prepare($insertThreadSQL);
    $preparedStatement->bind_param('isss', $groupNumber, $threadTitle, $userName, $date);

    // Given that a post can only exist if a thread does we need to retrieve the auto-incremented
    // thread ID from the DB before storing the $content in the forumposts table.
    if ($preparedStatement->execute() === true)
    { // In this case the query executed successfully.

        // Writing and executing a SQL query to get the threadID of the newly created thread.
        $getThreadIDSQL = "SELECT threadID
                           FROM forumthreads
                           WHERE peergroup=?
                           AND threadTitle=?
                           AND threadAuthor=?
                           AND dateTimeCreated=?";

        $preparedStatement2  = $conn->stmt_init();
        $preparedStatement2  = $conn->prepare($getThreadIDSQL);
        $preparedStatement2->bind_param('isss', $groupNumber, $threadTitle, $userName, $date);
        $result              = $preparedStatement2->execute(); // Will be a boolean
        $resultSet           = $preparedStatement2->get_result();

        $threadID   = null;
        if($result)
        {
            $preparedStatement2->store_result();
            while($row = $resultSet->fetch_array(MYSQLI_ASSOC)) //Fetch the resultSet as an associativeArray.
            {
                $threadID = $row["threadID"];
            }
        }

        // Now insert the content in the forumposts table.
        if($threadID)
        {
            $insertPostSQL = "INSERT INTO forumposts (threadID, author, date, content) VALUES (?, ?, ?, ?)";
            $preparedStatement3  = $conn->stmt_init();
            $preparedStatement3  = $conn->prepare($insertPostSQL);
            $preparedStatement3->bind_param('isss', $threadID, $userName, $date, $content);

            if($preparedStatement3->execute() === true)
            {
                header('location: ../../../forum.php');
            }
            else
            {
                echo "<script> alert('Inserting your thread\'s content into the database failed'); </script>";
                header('location: ../../../forum.php');
            }

        }
    } else
    {
        echo "<script> alert('Inserting into the database failed'); </script>";
    }


?>