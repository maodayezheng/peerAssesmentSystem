<!-- PHP Code to add the post to the thread -->
<?php
    session_start();
    require_once('../../PHP/DBConnection.php');

    $threadID = $_POST["threadID"];


    // Now insert the content in the forumposts table.
    if($threadID)
    {
        $userName       = $_SESSION["userName"];
        $content        = $_POST ['content'];
        $date           = date("Y-m-d H:i:s");

        // Insert the new thread into the forumThreads table.
        $insertPostSQL = "INSERT INTO forumposts(threadID, author, date, content) VALUES (?, ?, ?, ?)";
        $preparedStatement  = $conn->stmt_init();
        $preparedStatement  = $conn->prepare($insertPostSQL);
        $preparedStatement->bind_param('isss', $threadID, $userName, $date, $content);

        // Given that a post can only exist if a thread does we need to retrieve the auto-incremented
        // thread ID from the DB before storing the $content in the forumposts table.
        if ($preparedStatement->execute() === true)
        {
            header('location: ../../forumPage.php');
        }
        else
        {
            echo "<script> alert('Inserting your thread\'s content into the database failed'); </script>";
            header('location: ../../forumPage.php');
        }

    }

?>