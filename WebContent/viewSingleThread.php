<?php
    require_once ("PHP/init.php");
    require_once ('PHP/DBConnection.php');
    include("header.php");
    include("navbar.php");
    spl_autoload_register(function($class) { require_once 'pageSnippets/forum/forumClasses/'.$class.'.php'; });     // Class auto-loader


    // The threadID is the only variable which should be passed through a GET request to this script.
    // This should be an integer, so to check we replace any non-numeric characters with the empty string.
    $sanitisedThreadID = preg_replace('#[^0-9]#i', '', $_GET["threadID"]);
    $rawThreadID = $_GET["threadID"];

    // Kill the script if the data doesn't validate.
    if(!($sanitisedThreadID === $rawThreadID))
    {
        echo new SearchBar("forum");
        die("Invalid threadID");
    }

    echo new SearchBar("forum");

    $userInfo = array(
        "userName"  => $_SESSION["userName"],
        "peergroup" => $_SESSION["peergroup"]
    );


    $threadIDs = array(
        "sanitisedThreadID" => $sanitisedThreadID
    );

    echo new ForumTable(getDB(), 'posts', $userInfo, $threadIDs);



?>





<?php

include("footer.php");

?>

