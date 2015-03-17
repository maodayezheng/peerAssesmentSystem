<?php

    require_once ("PHP/init.php");
    require_once("PHP/DBConnection.php");
    include ("header.php");
    include ("navbar.php");
    spl_autoload_register(function($class) { require_once 'pageSnippets/forum/forumClasses/'.$class.'.php'; });     // Class auto-loader

    echo new SearchBar();

    $userInfo = array(
        "userName"  => $_SESSION["userName"],
        "peergroup" => $_SESSION["peergroup"]
    );


    $threadIDs = array(52, 62);
    echo new ForumTable(getDB(), 'threads', $userInfo, $threadIDs);



?>





<?php

include("footer.php");

?>