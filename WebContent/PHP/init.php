<?php

    /** Class auto-loader. Source code must be in same directory as this file. */
    spl_autoload_register(function($class)
    {
        require_once $class.'.php';
    });

    // Contains functionality which may be useful in other scripts.
    require_once "functions.php";

?>