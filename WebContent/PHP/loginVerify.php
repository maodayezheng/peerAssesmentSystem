<?php
require_once ('DBConnection.php');
// include 'init.php';

$username = $_POST ['username'];
$password = $_POST ['password'];

// CONFIRM USERNAME + PASSWORD MATCH + CONFIRM LOGIN

$query = "SELECT * from account where userName = '$username' and password = '$password'";
$result = mysqli_query ( $conn, $query );
if (mysqli_num_rows ( $result ) == 1) {
	$data = $result -> fetch_assoc();
	session_start();
	if(!isset($_SESSION["userName"])){
	$_SESSION ["userName"] = $data["userName"];
	$_SESSION ["peergroup"] = $data["peergroup"];
	setcookie("userName",$data["userName"],time()+(60*60*24));
	setcookie("peergroup",$data["peergroup"],time()+(60*60*24));
	}else{
	 header ( 'location: ../forumPage.php' );
	}
} else {
	echo "incorrect username / password";
}

?>