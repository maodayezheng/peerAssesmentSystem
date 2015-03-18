<?php
/**
 * This script is intended to be required at the top of a page. It contains core functionality for use within
 * each page such as checking if the user is logged in or whether they have the right permissions.
 */

    function userIsLoggedIn()   { return isset($_SESSION["userName"]);            }
    function userIsAdmin()      { return $_SESSION["accountType"] === "admin";    }
    function userHasPeerGroup() { return isset($_SESSION["peergroup"]);           }


    function endScript($message)
    {
        exit('<div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <table>
                            <tr>
                                <th style="font-size: 20px;" colspan="2">
                                    <div  style="width=100%;">' . $message . '
                                    </div>
                                </th>
                            </tr>
                        </table>
                    </div>');
    }

    function userPeerGroupNotSet($message)
    {
        exit('<div class="container" >

                <!--Jumbotron Header-->
                <header class="jumbotron hero-spacer" >
                    <h1 > Welcome to Peer System!</h1 >
                    <h4 > "Collaborate for better results"</h4 >
                </header >

            <hr >
                <!--Title -->
                <div class="jumbotron hero-spacer" style="margin: 5%; padding: 5%;">
                        <h3 style = "color:black" ><em >'.$message.'</em >
                            <br />
                        </h3 >
                </div >
            </div>');
    }


    function login($db, $username, $password, $success)
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

                if($data["accountType"]==="student")    { header ("location: $success.php");    }
                else if($data["accountType"]==="admin") { header ('location:.adminHome.php'); }


            } else
            {
                die("Incorrect Username or password");
            }
        }
    }
?>