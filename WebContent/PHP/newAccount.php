<?php
if (isset ( $_POST ['submit'] ))
{
    require_once('DBConnection.php');

    $conn = new mysqli ($servername, $username, $password, $dbname, $port);

    // Since we are taking input from the user using $_POST, we need to sanitise it.
    // The following performs a case insensitive regular expression replace i.e. it replaces any character
    // that is not a letter or a number with the empty string ''.
    $userName   = preg_replace('#[^a-z 0-9]#i', '', $_POST ['userName']);
    $fName      = preg_replace('#[^a-z 0-9]#i', '', $_POST ['fName']);
    $lName      = preg_replace('#[^a-z 0-9]#i', '', $_POST ['lName']);
    $sex        = preg_replace('#[^a-z 0-9]#i', '', $_POST ['sex']);
    $password   = preg_replace('#[^a-z 0-9]#i', '', $_POST ['password']);

    echo "username is $userName, fName is $fName, lName is $lName, sex is $sex, password is $password";


    function check($source, $items = array()) //The keys in the $items associative array must match the the keys passed in the $source array.
    {
        $errors         = array();
        $checksPassed   = false;

        foreach($items as $item => $rules) //$item will be each of the entries e.g. nhsnumber, password. $rules will be the array that governs each $item. see register.php.
        {
            foreach($rules as $rule => $rule_value)
            {
                $value = trim($source[$item]); //get rid of whitespaces.

                // If the rule is that the validation requires an input and the input is empty push an error to the errors array.
                if($rule === 'required' && empty($value)) { array_push($errors, "{$item} is required"); }
                // Otherwise if the value is not empty:
                else if(!empty($value))
                {
                    // Switch on what the rule is (could be a min value or a max value etc).
                    switch($rule)
                    {
                        case 'min':
                            if(strlen($value)<$rule_value)      { array_push($errors, "{$item} must be a minimum of {$rule_value} characters"); }
                            break;
                        case 'max':
                            if(strlen($value)>$rule_value)      { array_push($errors, "{$item} must be a maximum of {$rule_value} characters"); }
                            break;
                        case 'matches':
                            if($value != $source[$rule_value])  { array_push($errors, "{$rule_value} must match {$item}"); }
                            break;
                        case 'unique':
                            

                            $check = $this->_db->get($rule_value, array($item,'=',$value));
                            if($check->count()) { array_push($errors, "{$item} already exists. Please choose another"); }
                            break;
                    }
                }
            }
        }

        if(empty($errors)) //if the errors array is empty at this point then all of the checks were passed.
        {
            $checksPassed = true;
        }

        return $checksPassed;
    }








































    ////////////////// VALIDATION

    $validate 	= new Validate();
    $validation = $validate -> check($dataDecoded, array()); 	//passing an empty array so that there are no conditions which need to be passed. Refer to commented out code
    //below to see what type of array can be passed to enforce validation.

    /* Code is commented out as it was decided validation would be done client side.
     * It is included for functionality demonstration purposes. */

         $validation = $validate -> check($dataDecoded, array(  //The array as the second parameter should contain the relevant conditions for each key in $dataDecoded
               'nhsnumber' => array(
                       'required' => true,
                       'min' => 5, //min length
                       'max' => 15, //max length
                       'unique' => 'users'
               ),
               'password' => array(
                       'required' => true,
                       'min' => 6,
               ),
               'confirmpassword' => array(
                       'required' => true,
                       'matches' => 'password'
               ),
               'weight' => array(
                       'required' => true
               ),
               'dob' => array(),
               'activitylevel' => array()
       ));


    if($validation->passed()) //An empty array was passed as the conditions for validation so this will always be true (unless code commented above is amended).
    {
        switch($dataDecoded['group'])
        {
            case 1: registerPatient($dataDecoded); 		break;
            case 2: registerDietician($dataDecoded); 	break;
        }
    }


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