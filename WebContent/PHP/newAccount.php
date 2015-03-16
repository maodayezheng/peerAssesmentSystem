<?php
if (isset ( $_POST ['submit'] )) {
	
	require_once ('DBConnection.php');
	
	$conn = new mysqli ( $servername, $username, $password, $dbname, $port );
	
	$userName       = $_POST ['username'];
	$fname          = $_POST ['fname'];
	$lname          = $_POST ['lname'];
	$sex            = $_POST ['sex'];
	$password       = $_POST ['password'];

    $insertPostSQL = "INSERT INTO forumposts (threadID, author, date, content) VALUES (?, ?, ?, ?)";
    $preparedStatement3  = $conn->stmt_init();
    $preparedStatement3  = $conn->prepare($insertPostSQL);
    $preparedStatement3->bind_param('isss', $threadID, $userName, $date, $content);

    if($preparedStatement3->execute() === true)
    {
        echo "Registration successful";
        header ( 'location: ../login.php' );
    }
    else
    {
        echo "Registration Failed";
        header('location: ../../register.php');

    }


	$sql = "INSERT INTO account (userName,fName,lName,password,sex,accountType,id)
            VALUES ('$userName','$fname','$lname','$password','$sex','$accounttype',NULL)";
	

}
;
?>