
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Peer Review</title>
<!-- makes sure it displays the mobile version on mobile and desktop version on desktop-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="libs/jquery/jquery-2.1.1.min.js"></script>
<script src="libs/jquery/jquery-ui-1.11.2.min.js"></script>
<script src="libs/bootstrap/bootstrap.min.js"></script><script src="JavaScript/Navigator.js"></script>

    <?php

    // E.g. If you are including this file from index.php, the variable would be
    // equal to 'index'
    $file_including_header = basename($_SERVER["REQUEST_URI"], ".php");

    switch($file_including_header)
    {
        // List references to specific JS/CSS files to include for each individual page here.
        case 'index':
            echo '<script src="JavaScript/index.js"></script>';
            echo '<link href="CSS/index.css" rel="stylesheet" type="text/css" />';
            break;
        case 'resultsAndRanking':
            echo '<script src="JavaScript/resultsAndRanking.js"></script>';
            echo '<link href="CSS/resultsAndRanking.css" rel="stylesheet" type="text/css" />';
            break;
        default: //do nothing in default case
            break;
    }

?>







<link href= "libs/jquery/jquery-ui-1.11.2.min.css" rel="stylesheet" type="text/css">
<link href="libs/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="CSS/standard.css" rel="stylesheet" type="text/css" />





</head>
<body>

