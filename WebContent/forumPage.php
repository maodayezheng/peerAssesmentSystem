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
                        <input type="text" name="searchTerms" class="form-control" placeholder="Search the Forum">

                        <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">Advanced Search </button>
                           </span>

                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">Search</button>
                           </span>
                    </div>
                </form>
            </h4>
        </div>
    </div>

<!-- Process the search query if it is set and not equal to the empty string. -->
<?php
    if (isset($_POST["searchTerms"]) && (isset($_POST["searchTerms"]) != ""))
    {
        echo "search term is set";
    } else
    {
        echo "search term is not set";
    }
?>


<!-- Forum Showing All Entries for the group. Shown when no search terms are presented to the search bar.
---- When a search is made, this is removed from the DOM. -->
<?php
    include("pageSnippets/forum/forum.php");
?>



</div>
</html>