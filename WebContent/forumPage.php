<?php
	require_once ("PHP/init.php");
    include ("header.php");
	include ("navbar.php");


?>

<!-- Search Box Settings -->
    <div class="panel panel-default" id="panel2">
        <div class="panel-heading">
            <h4 class="panel-title">
                <form action="forumPage.php" method="post">
                    <div class="input-group">
                        <input type="text" name="searchQuery" class="form-control" placeholder="Search the Forum">
                        <span class="input-group-btn">
                            <a data-toggle="collapse" data-target="#advancedSearch" href="#advancedSearch"
                                <button type="button" class="btn btn-default">Advanced Search </button>
                            </a>
                           </span>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">Search</button>
                           </span>
                    </div>

                    <!-- Clicking the advanced search button will open this collapsed div -->
                    <div id="advancedSearch" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p> Choose a filter for the search:
                            <select name="filter">
                                <option value="WholeForum">Whole Forum</option>
                                <option value="ThreadTitlesOnly">Thread Titles Only</option>
                                <option value="PostsOnly">Posts Only</option>
                                <option value="GroupMembersOnly">Group Members Only</option>
                            </select>
                            </p>
                        </div>
                    </div>

                </form>
            </h4>
        </div>
    </div>

<!-- Forum Showing All Entries for the group. -->
<?php
    include("pageSnippets/forum/forum.php");
?>



<!-- Logic to process the search query and if it is set and not equal to the empty string. -->
<?php
if (isset($_POST["searchQuery"]) && (isset($_POST["searchQuery"]) != ""))
{
    // Perform a regular expression search and replace of the parameter passed in by the user. for any characters in the first argument
    // This is to allow only certain characters sent to the database. In this case anything which is not a letter, not a number,
    // not a ' ' space, not a '?', and not a '!' will be replaced with the empty string ''.
    // e.g. '; INSERT INTO ... (...) VALUES (...)' will not allow the ';', '(', and ')' characters.
    $searchQuery = preg_replace('#[^a-z 0-9?!]#i', '', $_POST["searchQuery"]);

    if($_POST['filter'] === "WholeForum")
    {
        echo "in WholeForum";
    } else if($_POST['filter'] === "ThreadTitlesOnly")
    {
        echo "in threadTitles Only";
    } else if($_POST['filter'] === "PostsOnly")
    {
        echo "in Posts Only";
    } else if($_POST['filter'] === "GroupMembersOnly")
    {
        echo "in group members only";
    }

    // Connect to the database, run the query and dynamically generate the data from the search results.
    $count = 1; //num rows
    if($count > 0)
    {
        // Logic to generate the forum containing the search results.
    } else
    {

    }

} else
{
    echo "search term is not set";
}
?>



</div>
</html>