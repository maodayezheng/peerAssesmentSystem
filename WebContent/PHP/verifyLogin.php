<?php


    function login($db, $username, $password)
    {
        // Retrieve the SALT.
        $query = "SELECT salt, password, userName, peergroup, accountType from account where userName = '$username'";
        $result = mysqli_query ( $db, $query );
        if (mysqli_num_rows($result) != 1)
        {
            die("Incorrect Username or password");
        } else
        {
            $data = $result -> fetch_assoc();
            $salt           = $data["salt"];
            $hashedPassword = hash('sha256', $password . $salt);

            if($hashedPassword === $data["password"])
            {
                // In this case, the correct password was provided for the user so set the session variables.
                session_start();
                $_SESSION["userName"]    = $data["userName"];
                $_SESSION["peergroup"]   = $data["peergroup"];
                $_SESSION["accountType"] = $data["accountType"];

                if($data["accountType"]==="student")    { header ('location: ../index.php');    }
                else if($data["accountType"]==="admin") { header ('location:../adminHome.php'); }


            } else
            {
                die("Incorrect Username or password");
            }
        }
    }

    require_once ('DBConnection.php');
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    login($conn, $username, $password);


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