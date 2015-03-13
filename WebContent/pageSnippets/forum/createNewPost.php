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


        $insertPostSQL = "INSERT INTO forumposts (threadID, author, date, content)
                               VALUES ('$threadID', '$userName', '$date', '$content')";


        echo "<script> alert('The current SQL is $insertPostSQL'); </script>";

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

?>