<?php
require_once ('DBConnection.php');
//include 'init.php';

 	$username = $_POST ['username'];
 	$password = $_POST ['password'];

$query="SELECT * from account where userName = '$username' and password = '$password'";
$result = mysqli_query ($conn,$query);
if(mysqli_num_rows($result)==1){
	session_start();
	$_SESSION['auth']='true';
	header('location: ../index.php');
} else {
	echo "incorrect username / password";
}

// if (user_exists('john') === true){
// 	echo 'user exists';
// }

// if(empty($_POST)===false){
// 	$username = $_POST ['username'];
// 	$password = $_POST ['password'];
	
// 	if(empty($username)===true || empy($password)===true){
// 		$errors[] = 'you need to enter a username and password';
// 	} else if (user_exists($username) === false) {
// 		$errors[] = "We cant find that username in db, are you sure you registered?";
// 	}
// }

// echo "HERE";



// if ($username && $password) {
	
// 	mysqli_select_db ( $conn, "peersystem" ) or die ( "couldn't find db" );
	
// 	$query = mysql_query("SELECT * FROM account WHERE userName='$username'");
// 	$numrows = mysql_num_rows($query);
// 	echo $numrows;
	
// } else {
// 	echo "Please enter username and password";
// }

?>