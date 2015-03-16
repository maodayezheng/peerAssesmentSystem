<?php

    require_once ("PHP/init.php");
    include ("header.php");
    include ("navbar.php");
    require_once("pageSnippets/forum/forumClasses/SearchBar.php");

    echo new SearchBar();

?>





<?php

include("footer.php");

?>