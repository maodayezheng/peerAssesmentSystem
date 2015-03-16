<?php

function validate($conn, $source, $items = array()) //The keys in the $items associative array must match the the keys passed in the $source array.
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
                    case 'unique': // In this case the $rule_value refers to the table and $item refers to the column to be checked.
                        $checkUnique = "SELECT $item
                                        FROM $rule_value
                                        WHERE $item=?";

                        $preparedStatement  = $conn->stmt_init();
                        $preparedStatement  = $conn->prepare($checkUnique);
                        $preparedStatement->bind_param('s', $value);
                        $result              = $preparedStatement->execute(); // Will be a boolean

                        $numRows = $preparedStatement->num_rows;
                        echo "<br />";
                        var_dump($result);
                        echo "<br /> Above is result and below is numRows <br />";
                        var_dump($numRows);
                        var_dump($checkUnique);
                        if($numRows != 0) { array_push($errors, "{$item} already exists. Please choose another"); }
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

?>