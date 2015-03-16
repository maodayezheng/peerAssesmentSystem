<?php
if (isset ( $_POST ['submit'] ))
{

    require_once('DBConnection.php');

    $conn = new mysqli ($servername, $username, $password, $dbname, $port);

    // Since we are taking input from the user using $_POST, we need to sanitise it.
    // The following performs a case insensitive regular expression replace i.e. it replaces any character
    // that is not a letter or a number with the empty string ''.
    $userName = preg_replace('#[^a-z 0-9]#i', '', $_POST ['userName']);
    $fName = preg_replace('#[^a-z 0-9]#i', '', $_POST ['fName']);
    $lName = preg_replace('#[^a-z 0-9]#i', '', $_POST ['lName']);
    $sex = preg_replace('#[^a-z 0-9]#i', '', $_POST ['sex']);
    $password = preg_replace('#[^a-z 0-9]#i', '', $_POST ['password']);

    echo "username is $userName, fName is $fName, lName is $lName, sex is $sex, password is $password";

    function check($source, $items = array()) //The keys in the $items associative array must match the the keys passed in the $source array.
    {
        foreach($items as $item => $rules) //$item will be each of the entries e.g. nhsnumber, password. $rules will be the array that governs each $item. see register.php.
        {
            foreach($rules as $rule => $rule_value)
            {
                $item = escape($item); //for sanitisation. imported from init.php and functionality is in functions.php.
                $value = trim($source[$item]); //get rid of whitespaces.

                if($rule === 'required' && empty($value))
                {
                    $this->addError("{$item} is required");
                } else if(!empty($value))
                {
                    switch($rule)
                    {
                        case 'min': if(strlen($value)<$rule_value) { $this-> addError("{$item} must be a minimum of {$rule_value} characters"); }
                            break;
                        case 'max': if(strlen($value)>$rule_value) { $this-> addError("{$item} must be a maximum of {$rule_value} characters"); }
                            break;
                        case 'matches': if($value != $source[$rule_value]) { $this-> addError("{$rule_value} must match {$item}"); }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item,'=',$value));
                            if($check->count()) { $this -> addError("{$item} already exists"); }
                            break;
                    }
                }
            }
        }
        if(empty($this->_errors)) //if the errors array is empty at this point then all of the checks were passed.
        {
            $this->_passed = true;
        }

        return $this;
    }

}




  /*  $insertPostSQL = "INSERT INTO forumposts (threadID, author, date, content) VALUES (?, ?, ?, ?)";
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
	*/


?>