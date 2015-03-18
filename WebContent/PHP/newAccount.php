<?php
    require_once("validate.php");

    if (isset ( $_POST ['submit'] ))
    {
        require_once('DBConnection.php');

        $conn = new mysqli ($servername, $username, $password, $dbname, $port);

        // Since we are taking input from the user using $_POST, we need to sanitise it.
        // The following performs a case insensitive regular expression replace i.e. it replaces any character
        // that is not a letter or a number with the empty string ''.
        $userName       = preg_replace('#[^a-z 0-9]#i', '', $_POST ['userName']);
        $fName          = preg_replace('#[^a-z 0-9]#i', '', $_POST ['fName']);
        $lName          = preg_replace('#[^a-z 0-9]#i', '', $_POST ['lName']);
        $sex            = preg_replace('#[^a-z 0-9]#i', '', $_POST ['sex']);
        $password       = preg_replace('#[^a-z 0-9]#i', '', $_POST ['password']);
        $confirmPassword = preg_replace('#[^a-z 0-9]#i', '', $_POST ['confirmPassword']);

        $dataToBeValidated = array
        (
            "userName" => $userName,
            "fName" => $fName,
            "lName" => $lName,
            "sex" => $sex,
            "password" => $password,
            "confirmPassword" => $confirmPassword
        );

        $validation = validate($conn, $dataToBeValidated, array(
            'userName' => array(
                'required' => true,
                'min' => 3, //min length
                'max' => 10, //max length
                'unique' => 'account' //userName must be unique in table 'account'
            ),
            'fName' => array(
                'required' => true,
                'min' => 2,
            ),
            'lName' => array(
                'required' => true,
            ),
            'sex' => array(
                'required' => true
            ),
            'password' => array(
                'required' => true,
                'min' => 6,
            ),
            'confirmPassword' => array(
                'matches' => 'password'
            )
        ));

        // For generating the salt.
        function generateRandomString($length = 10) {
            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        }

        if(empty($validation)) //if the errors array is empty at this point then all of the checks were passed, so register the user.
        {
            echo "all checks passed";

            // Create a SALT for the user account.
            $salt           = generateRandomString(32);

            // Hash the string created by concatenating the user's password and the salt.
            $hashedPassword = hash('sha256', $password . $salt);

            // This form only registers students so accountType is fixed.
            $accountType = 'student';

            $createUserSQL = "INSERT INTO account (`userName`, `fName`, `lName`, `password`, `sex`, `accountType`, `salt`)
                              VALUES (?, ?, ?, ?, ?, ?, ?);";
            $preparedStatement  = $conn->stmt_init();
            $preparedStatement  = $conn->prepare($createUserSQL);
            $preparedStatement->bind_param('sssssss', $userName, $fName, $lName, $hashedPassword, $sex, $accountType, $salt);

            if($preparedStatement->execute() === true)
            {
                header ( 'location: ../login.php' );
            }
            else
            {
                echo "Registration Failed";
                var_dump($conn->error);
                //header('location: ../../register.php');

            }

        }
    }
?>