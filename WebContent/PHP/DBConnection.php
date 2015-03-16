<?php
$servername = "eu-cdbr-azure-west-b.cloudapp.net";
$username = "b41c1a25cb18b9";
$password = "67705167";
$dbname = "peerSystem";
$port = "3306";

$conn = new mysqli ( $servername, $username, $password, $dbname, $port );


 if ($conn->connect_error) {
	
 	die ( "Connection failed:" . $conn->connect_error );
 }





?>