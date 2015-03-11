<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Peer Review</title>
<!-- makes sure it displays the mobile version on mobile and desktop version on desktop-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="/WebContent/CSS/standard.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/WebContent/libs/jquery/jquery-2.1.1.min.js"></script>
<script src="/WebContent/libs/jquery/jquery-ui-1.11.2.min.js"></script>
<script src="/WebContent/libs/bootstrap/bootstrap.min.js")  ></script>
<script src="/peerAssesmentSystem/WebContent/JavaScript/Navigator.js")          ></script>

    <?php

    // E.g. If you are including this file from index.php, the variable would be
    // equal to 'index'
    $file_including_header = basename($_SERVER["REQUEST_URI"], ".php");
    
    switch($file_including_header)
    {
        // List references to specific JS/CSS files to include for each individual page here.
        case 'index':
            echo '<script src="/WebContent/JavaScript/index.js"></script>';
            echo '<link href="/WebContent/CSS/index.css" rel="stylesheet" type="text/css" />';
            break;
        case 'resultsAndRanking':
            echo '<script src="/WebContent/JavaScript/resultsAndRanking.js"></script>';
            echo '<link href="/WebContent/CSS/resultsAndRanking.css" rel="stylesheet" type="text/css" />';
            break;
        default: //do nothing in default case
            break;
    }

?>

<link href="/WebContent/libs/jquery/jquery-ui-1.11.2.min.css" rel="stylesheet" type="text/css">
<link href="/WebContent/libs/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">


</head>
<body>

