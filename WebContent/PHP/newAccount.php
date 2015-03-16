<?php
if (isset ( $_POST ['submit'] )) {
	
	require_once ('DBConnection.php');
	
	$conn = new mysqli ( $servername, $username, $password, $dbname, $port );
	
	$userName       = $_POST ['username'];
	$fname          = $_POST ['fname'];
	$lname          = $_POST ['lname'];
	$sex            = $_POST ['sex'];
	$password       = $_POST ['password'];


	$sql = "INSERT INTO account (userName,fName,lName,password,sex,accountType,id)
            VALUES ('$userName','$fname','$lname','$password','$sex','$accounttype',NULL)";
	
	if ($conn->query ( $sql ) === true) {
		// output data of each row
		echo "Registration successful";
		header ( 'location: ../login.php' );
	} else {
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}
;
?>