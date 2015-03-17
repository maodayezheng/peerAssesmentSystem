<!-- Logic to process the search query. It is only executed if it exists and is not set to the empty string. -->
<?php

    require_once ("PHP/init.php");
    require_once("PHP/DBConnection.php");
    include ("header.php");
    include ("navbar.php");

if (isset($_POST["searchQuery"]) && ($_POST["searchQuery"] != ""))
{
    $userName       = $_SESSION["userName"];

    // The user should only be able to conduct searches in threads which match his/her peergroup, and so
    // WHERE peergroup = $groupNumber is a condition for all of the queries.
    $groupNumber    = $_SESSION["peergroup"];

    // Perform a regular expression search and replace of the parameter passed in by the user.
    // This is to allow only certain characters to be sent to the database. In this case anything which is not a letter, not a number,
    // not a ' ', not a '?', and not a '!' will be replaced with the empty string ''.
    // e.g. '; INSERT INTO ... (...) VALUES (...)' will not allow the ';', '(', and ')' characters.
    $searchQuery = preg_replace('#[^a-z 0-9?!]#i', '', $_POST["searchQuery"]);

    $preparedStatement      = $conn->stmt_init();

    if($_POST['filter'] === "ThreadTitlesOnly")
    {
        $sqlCommand =  "SELECT threadID
                        FROM forumthreads
                        WHERE threadTitle LIKE CONCAT('%', ?, '%')
                        AND peergroup = ?";

        $preparedStatement      = $conn->prepare($sqlCommand);
        $preparedStatement->bind_param('si', $searchQuery, $groupNumber); //string and int.

    } else if($_POST['filter'] === "PostsOnly")
    {
        // If multiple posts in the same thread match the search string, there should still only be one entry in the query result.
        // To do this we do an INNER JOIN on the threadID field and GROUP BY the threadID also.
        // And since the user is only allowed to view content made by his/her group, filter the peer group also.
        $sqlCommand = "SELECT ft.threadID, fp.content
                       FROM forumthreads AS ft INNER JOIN forumposts AS fp ON ft.threadID = fp.threadID
                       WHERE fp.content LIKE CONCAT('%', ?, '%')
                       AND ft.peergroup = ?
                       GROUP BY fp.threadID";

        $preparedStatement      = $conn->prepare($sqlCommand);
        $preparedStatement->bind_param('si', $searchQuery, $groupNumber); //string and int.

    } else if($_POST['filter'] === "GroupMembersOnly")
    {
        // If the user checks the 'Threads including group member' option, then the DBMS should search the all of the relevant
        // posts for an author with a matching first name, last name or username. The search should only display users
        // if they are in the same group and given that a user can have multiple posts in a thread and we only require
        // a single threadID - GROUP BY the threadID.
        $sqlCommand = "SELECT fp.*, a.userName, a.fName, a.lName, a.peergroup
                           FROM forumposts AS fp INNER JOIN account AS a ON fp.author=a.userName
                           WHERE a.peergroup = ?
                           AND
                           (
                               fp.author LIKE CONCAT('%', ?, '%')
                              OR a.fName LIKE CONCAT('%', ?, '%')
                              OR a.lName LIKE CONCAT('%', ?, '%')
                           )
                           GROUP BY fp.threadID;";

        $preparedStatement      = $conn->prepare($sqlCommand);
        $preparedStatement->bind_param('isss', $groupNumber, $searchQuery, $searchQuery, $searchQuery); //int, string, string, string.
    }
    else if($_POST['filter'] === "WholeForum")
    {
        // In this case the person may be searching for a match in the thread Title, the thread posts, or for the post's author.
        // To facilitate this search we combine the three queries above using a UNION.
        "SELECT threadID
                        FROM forumthreads
                        WHERE threadTitle LIKE CONCAT('%', ?, '%')
                        AND peergroup = ?";


        "SELECT ft.threadID, fp.content
                       FROM forumthreads AS ft INNER JOIN forumposts AS fp
                       ON ft.threadID = fp.threadID
                       WHERE fp.content LIKE CONCAT('%', ?, '%')
                       AND ft.peergroup = ?
                       GROUP BY fp.threadID";

        "SELECT fp.*, a.userName, a.fName, a.lName, a.peergroup
                           FROM forumposts AS fp INNER JOIN account AS a ON fp.author=a.userName
                           WHERE a.peergroup = ?
                           AND
                           (
                               fp.author LIKE CONCAT('%', ?, '%')
                              OR a.fName LIKE CONCAT('%', ?, '%')
                              OR a.lName LIKE CONCAT('%', ?, '%')
                           )
                           GROUP BY fp.threadID;";

    }


    // The only variables used in the query sent to the DB are the $searchQuery and the $groupNumber.
    // The $groupNumber comes from the $_SESSION array so is already sanitised. The $searchQuery is
    // sanitised using the preg_replace function earlier in this script.
    $preparedStatement->execute();

    $result = $preparedStatement -> get_result();
    if ($result === FALSE || ($result->num_rows === 0))
    {
        // Logic to generate the forum containing a message saying no search results.
        echo ' No Search Results';
    } else
    {
        // Logic to generate the forum containing the search results.
        while ($row = $result->fetch_assoc())
        {
            if(isset($row['threadID'])) // In this case the user searched for 'Threads including a group member only'.
            {
                var_dump($row);
            }

        }
    }


} else
{
    echo "You did not set a search term.";
}
?>