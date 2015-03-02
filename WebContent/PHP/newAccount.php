<?php

if(isset($_POST['submit'])){

require_once('DBConnection.php');

$conn = new mysqli($servername,$username,$password,$dbname,$port);

 $userName = $_POST['username'];
 $password = $_POST['password'];
 $accounttype = $_POST['accounttype'];
 $sql = "INSERT INTO account (userName,password,accountType,id) VALUES ('$userName','$password','$accounttype',NULL)";

if ($conn->query($sql)===true) {
	// output data of each row
	echo "Selection complete";
	header('location: ../login.php');
} else {
	echo "Error:". $sql."<br>". $conn -> error;
}
};
?>