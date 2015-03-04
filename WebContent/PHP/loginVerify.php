<?php
require_once ('DBConnection.php');
// include 'init.php';

$username = $_POST ['username'];
$password = $_POST ['password'];

// CONFIRM USERNAME + PASSWORD MATCH + CONFIRM LOGIN

$query = "SELECT * from account where userName = '$username' and password = '$password'";
$result = mysqli_query ( $conn, $query );
if (mysqli_num_rows ( $result ) == 1) {
	session_start ();
	$_SESSION ['auth'] = 'true';
	header ( 'location: ../index.php' );
} else {
	echo "incorrect username / password";
}

?>