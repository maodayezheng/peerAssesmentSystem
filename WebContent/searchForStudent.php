<?php

require_once ("PHP/init.php");
require_once("PHP/DBConnection.php");
include ("header.php");
include ("navbar.php");
spl_autoload_register(function($class) { require_once 'pageSnippets/forum/forumClasses/'.$class.'.php'; });     // Class auto-loader

echo new SearchBar("admin");



?>


<?php

include("footer.php");

?>