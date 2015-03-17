<!-- PHP Code to add the post to the thread -->
<?php
    session_start();
    require_once('../../../PHP/DBConnection.php');

    // threadID should be an integer, so to check we replace any non-numeric characters with the empty string.
    $sanitisedThreadID = preg_replace('#[^0-9]#i', '', $_POST["threadID"]);


    // Now insert the content in the forumposts table.
    if($sanitisedThreadID)
    {
        $userName  = $_SESSION["userName"];
        $content   = $_POST ['content'];
        $date      = date("Y-m-d H:i:s");

        // Insert the new thread into the forumThreads table.
        $insertPostSQL = "INSERT INTO forumposts(threadID, author, date, content) VALUES (?, ?, ?, ?)";
        $preparedStatement  = $conn->stmt_init();
        $preparedStatement  = $conn->prepare($insertPostSQL);
        $preparedStatement->bind_param('isss', $sanitisedThreadID, $userName, $date, $content);

        // Given that a post can only exist if a thread does we need to retrieve the auto-incremented
        // thread ID from the DB before storing the $content in the forumposts table.
        if ($preparedStatement->execute() === true)
        {
            header('location: ../../../viewSingleThread.php?threadID='.$sanitisedThreadID);
        }
        else
        {
            echo "<script> alert('Inserting your thread\'s content into the database failed'); </script>";
            header('location: ../../../forum.php');
        }

    }

?>