
<!-- PHP Code to add the post to the thread -->
<?php
echo "<script> alert('You are in the create new post script'); </script>";

/*    $threadIDForForumPost = $variablesPassedToInclude["threadID"];
    // Now insert the content in the forumposts table.
    if($threadIDForForumPost)
    {
        $userName       = $_SESSION["userName"];
        $content        = $_POST ['content'];
        $date           = date("Y-m-d h:i:s");

        $insertPostSQL = "INSERT INTO forumposts (threadID, author, date, content)
                               VALUES ('$threadIDForForumPost', '$userName', '$date', '$content')";

        if($conn->query($insertPostSQL) === true)
        {
            header('location: ../../forumPage.php');
        }
        else
        {
            echo "<script> alert('Inserting your thread\'s content into the database failed'); </script>";
            header('location: ../../forumPage.php');
        }

}*/

?>