<?php



    require_once ('DBConnection.php');
    require_once ('coreFunctions.php');
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    login($conn, $username, $password, '../index');


/*
    // Initial Code

    $username = $_POST ['username'];
    $password = $_POST ['password'];

    // CONFIRM USERNAME + PASSWORD MATCH + CONFIRM LOGIN

    $query = "SELECT * from account where userName = '$username' and password = '$password'";
    $result = mysqli_query ( $conn, $query );
    if (mysqli_num_rows ( $result ) == 1){
        $data = $result -> fetch_assoc();
        session_start();

        if(!isset($_SESSION["userName"])){
            $_SESSION ["userName"] = $data["userName"];
            setcookie("userName",$data["userName"],time()+(60*60*24));

        if($data["accountType"] ==="student"){
        $_SESSION ["peergroup"] = $data["peergroup"];
        setcookie("peergroup",$data["peergroup"],time()+(60*60*24));
        }

        }else{

            if($data["accountType"]==="student"){
         header ( 'location: ../index.php' );
            }else{
                header ('location:../adminHome.php');
            }
        }
    } else {
        echo "incorrect username / password";
    }*/

?>