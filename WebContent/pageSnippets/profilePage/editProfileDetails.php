<?php
    require ("../../PHP/DBConnection.php");
    // This form input is un-editable by the user.
    $userName           = $_POST['userName'];

    // The following inputs are provided by the user so we need to sanitise it.
    // The following performs a case insensitive regular expression replace i.e. it replaces any character
    // that is not a letter or a number with the empty string ''.
    $editedFirstName    = preg_replace('#[^a-z 0-9]#i', '', $_POST['firstName']);
    $editedLastName     = preg_replace('#[^a-z 0-9]#i', '', $_POST['lastName']);
    $editedGender       = preg_replace('#[^a-z 0-9]#i', '', $_POST['gender']);

    echo $userName;
    echo $editedFirstName;
    echo $editedLastName;
    echo $editedGender;

    // Update the row in the accounts table.

    $updateAccountDetails = "UPDATE account
                             SET fName=?,lName=?, sex=?
                             WHERE userName=?";

    $preparedStatement  = $conn->stmt_init();
    $preparedStatement  = $conn->prepare($updateAccountDetails);
    $preparedStatement->bind_param('ssss', $editedFirstName, $editedLastName, $editedGender, $userName);

    // Given that a post can only exist if a thread does we need to retrieve the auto-incremented
    // thread ID from the DB before storing the $content in the forumposts table.
    if ($preparedStatement->execute() === true)
    {
        header('location: ../../profilePage.php');
    }
    else
    {
        echo "<script> alert('Altering your account details failed'); </script>";
        header('location: ../../profilePage.php');
    }
?>