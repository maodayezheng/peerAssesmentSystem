<?php
    session_start();

    require_once ("PHP/DBConnection.php");

    // If the userName session variable is not set, assume they are not logged in so redirect to login page.
    if(!isset($_SESSION["userName"]))
    {
        header ( 'location:login.php' );
    } else //Otherwise they are logged in so define variables for easy access in other scripts.
    {
        $groupNumber = $_SESSION["peergroup"];
        echo "your peergroup $groupNumber";
    }





?>