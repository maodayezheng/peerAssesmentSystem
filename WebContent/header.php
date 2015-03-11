<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Peer Review</title>
<!-- makes sure it displays the mobile version on mobile and desktop version on desktop-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php
    //Init file needs to be required on every page.
    require_once $_SERVER['DOCUMENT_ROOT'].'/WebContent/PHP/init.php';

    // JS and CSS imports to every page:
        // CSS File Paths
        $jQueryUICSS = (new Path("/WebContent/libs/jquery/jquery-ui-1.11.2.min.css"));
        $boostrapCSS = (new Path("/WebContent/libs/bootstrap/bootstrap.min.css"));

        // JS File Paths
        $jQuery      = (new Path("/WebContent/libs/jquery/jquery-2.1.1.min.js"));
        $jQueryUI    = (new Path("/WebContent/libs/jquery/jquery-ui-1.11.2.min.js"));
        $bootstrapJS = (new Path("/WebContent/libs/bootstrap/bootstrap.min.js"));
        $navigator   = (new Path("/WebContent/JavaScript/Navigator.js"));

        // JS Imports
        echo JSLink('http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
        echo JSLink($jQuery);
        echo JSLink($jQueryUI);
        echo JSLink($bootstrapJS);
        echo JSLink($navigator);

        // CSS Imports
        echo CSSLink($jQueryUICSS);
        echo CSSLink($boostrapCSS);

    // Page specific JS and CSS imports:
        // CSS File Paths
        $indexCSS               = (new Path("/WebContent/CSS/index.css"));
        $resultsAndRankingCSS   = (new Path("/WebContent/CSS/resultsAndRanking.css"));


        // JS File Paths
        $indexJS                = (new Path("/WebContent/JavaScript/index.js"));
        $resultsAndRankingJS    = (new Path("/WebContent/JavaScript/resultsAndRanking.js"));



        // Example: basename = 'index' when include('header.php') is being called from index.php.
        $file_including_header = basename($_SERVER["REQUEST_URI"], ".php");

        switch($file_including_header)
        {
            // List references to specific JS/CSS files to include for each individual page here.
            case 'index':
                echo JSLink($indexJS);
                echo CSSLink($indexCSS);
                break;
            case 'resultsAndRanking':
                echo JSLink($resultsAndRankingJS);
                echo CSSLink($resultsAndRankingCSS);
                break;
            default: //do nothing in default case
                break;
        }

?>


</head>
<body>

