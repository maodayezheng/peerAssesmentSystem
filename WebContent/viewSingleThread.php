<?php
    require_once ("PHP/init.php");
    require_once ('PHP/DBConnection.php');
    include("header.php");
    include("navbar.php");

    // Class auto-loader
    spl_autoload_register(function($class)
    {
        require_once 'pageSnippets/forum/forumClasses/'.$class.'.php';
    });

    // The threadID is the only variable which should be passed througha GET request to this script.
    // This should be an integer, so to check we do replace any non-numeric characters with the empty string.
    $sanitisedThreadID = preg_replace('#[^0-9]#i', '', $_GET["threadID"]);
    $rawThreadID = $_GET["threadID"];

    // Kill the script if the data doesn't validate.
    if(!($sanitisedThreadID === $rawThreadID))
    {
        echo new SearchBar();
        die("Invalid threadID");
    }

    echo new SearchBar();

    $userInfo = array(
        "userName"  => $_SESSION["userName"],
        "peergroup" => $_SESSION["peergroup"]
    );


    $threadIDs = array(52, 62);
    echo new ForumTable(getDB(), 'posts', $userInfo, $threadIDs);



?>





<?php

include("footer.php");

?>

