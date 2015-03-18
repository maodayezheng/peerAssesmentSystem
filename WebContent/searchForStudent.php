<?php

    require_once ("PHP/init.php");
    require_once("PHP/DBConnection.php");
    include ("header.php");
    include ("navbar.php");
    spl_autoload_register(function($class) { require_once 'pageSnippets/forum/forumClasses/'.$class.'.php'; });     // Class auto-loader
    require_once("PHP/coreFunctions.php");

    if(!userIsLoggedIn())   { endScript('You are not currently logged in. Please click <a href="login.php"> here </a> to be redirected.');  }
    if(!userIsAdmin())      { endScript("You Do Not Have Permission To View This Page."); }



    // Setting up the query to return the entire student directory.
    $searchQuery = "SELECT userName, fName, lName, sex, accountType, peergroup
                    FROM account
                    WHERE accountType='student' ";

    // Begin preparing the query.
    $preparedStatement = $conn->stmt_init();

    $sanitisedSearchTerm = null;
    $searchTermExists    = false;

    // If this is set the user has asked for a search to take place.
    if (isset($_POST["searchQuery"]) && ($_POST["searchQuery"] != ""))
    {
        $searchTermExists = true;

        // Perform a regular expression search and replace of the parameter passed in by the user.
        // This is to allow only certain characters to be sent to the database. In this case anything which is not a letter, not a number,
        // not a ' ', not a '?', and not a '!' will be replaced with the empty string ''.
        // e.g. '; INSERT INTO ... (...) VALUES (...)' will not allow the ';', '(', and ')' characters.
        $sanitisedSearchTerm = preg_replace('#[^a-z 0-9?!]#i', '', $_POST["searchQuery"]);

        $searchQuery .= "AND
                         (
                            userName LIKE CONCAT('%', ?, '%')
                            OR fName LIKE CONCAT('%', ?, '%')
                            OR lName LIKE CONCAT('%', ?, '%')
                         );";

        $preparedStatement = $conn->prepare($searchQuery);
        $preparedStatement->bind_param('sss', $sanitisedSearchTerm, $sanitisedSearchTerm, $sanitisedSearchTerm);

    } else // Otherwise the $searchQuery does not require a filter so close it off with a semi colon and pass it to be further prepared.
    {
        $searchQuery .= ";";
        $preparedStatement = $conn->prepare($searchQuery);
    }

    $result     = $preparedStatement->execute(); // Will be a boolean
    $resultSet  = $preparedStatement->get_result();
    $preparedStatement->store_result();


    echo new SearchBar("admin");

?>

    <!-- The Student Directory -->
    <div class="container" style="">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <table>
                    <tr>
                        <th style="font-size: 20px;" colspan="2">
                            <div  style="width=100%;">
                            <?php
                                if($searchTermExists)
                                {
                                    echo "Search Results for: <span style=\"font-style: italic;\"> $sanitisedSearchTerm </span>";
                                } else
                                {
                                    echo "Viewing Entire Student Directory";
                                }

                             ?>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>

            <!-- Table containing an entry for each student which matches the query. -->
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
                .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
                .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#333;background-color:#26ADE4;}
                .tg .tg-shvy{font-weight:bold;background-color: #f5f5f5; font-size: 16px; text-align: center; }
            </style>
            <table class="tg" style="width: 100%;">


<?php
        if ( ($resultSet === FALSE) || ($resultSet->num_rows === 0) )
        {
        echo '<tr>
                <td colspan="3" style="text-align: left; font-size: 20px;">
                    There are currently no student profiles to display.  <br />
                </td>
            </tr>';

        } else
        {
            while ($row = $resultSet->fetch_array(MYSQLI_ASSOC))
            {
                $userName       = htmlentities($row["userName"]);
                $fName          = htmlentities($row["fName"]);
                $lName          = htmlentities($row["lName"]);
                $sex            = htmlentities($row["sex"]);
                $accountType    = htmlentities($row["accountType"]);
                $peerGroup      = htmlentities($row["peergroup"]);

                echo
                "<tr>
                    <th class=\"tg-shvy\">Username:</th>
                    <th class=\"tg-shvy\">First Name:</th>
                    <th class=\"tg-shvy\">Last Name:</th>
                    <th class=\"tg-shvy\">Gender:</th>
                    <th class=\"tg-shvy\">Account Type:</th>
                    <th class=\"tg-shvy\">Peer Group:</th>
                </tr>
                <tr>
                    <td class=\"tg-031e\" style=\"text-align: center;\"> <a href=\"profilePage.php?userName=$userName\"> $userName </a>  </td>
                    <td class=\"tg-031e\" style=\"text-align: center;\"> $fName </td>
                    <td class=\"tg-031e\" style=\"text-align: center;\"> $lName </td>
                    <td class=\"tg-031e\" style=\"text-align: center;\"> $sex </td>
                    <td class=\"tg-031e\" style=\"text-align: center;\"> $accountType </td>
                    <td class=\"tg-031e\" style=\"text-align: center;\"> $peerGroup </td>

                </tr>";
            }
        }


?>

            </table>
        </div>
    </div>







<?php

    include("footer.php");

?>