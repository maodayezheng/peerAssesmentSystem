<?php

require_once('DBConnection.php');
session_start();
if (isset ( $_SESSION ["peergroup"] )) {
	$group = $_SESSION ["peergroup"];
}

    $sql ="DELETE FROM freetextreports WHERE id='$group';";
    
    if ($conn->query ( $sql ) === true) {
    	// output data of each row
    	echo "Delete complete";
    	header ( 'location: ../submitReport.php' );
    } else {
    	echo "Error:" . $sql . "<br>" . $conn->error;
    }

?>