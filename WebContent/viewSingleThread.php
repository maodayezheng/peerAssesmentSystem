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

