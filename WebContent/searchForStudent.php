<?php

    require_once ("PHP/init.php");
    require_once("PHP/DBConnection.php");
    include ("header.php");
    include ("navbar.php");
    spl_autoload_register(function($class) { require_once 'pageSnippets/forum/forumClasses/'.$class.'.php'; });     // Class auto-loader


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

    if ($result)
    {
        $preparedStatement->store_result();
        $row = $resultSet->fetch_array(MYSQLI_ASSOC); //Fetch the resultSet as an associativeArray.

        $userName    = $row["userName"];
        $fName       = $row["fName"];
        $lName       = $row["lName"];
        $sex         = $row["sex"];
        $accountType = $row["accountType"];
        $peerGroup   = $row["peergroup"];
    }

    echo new SearchBar("admin");

    echo "Search for {$_POST["searchQuery"]} returned {$resultSet->num_rows} rows";

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
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th style="text-align: center; font-size: 20px; width: 80%" >';
                        STUDENTS MATCHING YOUR SEARCH
                    </th>
                    <th style="text-align: center; font-size: 20px; width: 20%">';

                    </th>
                </tr>
                </thead>
                <tbody>
                    Row for each result.

                </tbody>
            </table>
        </div>
    </div>







<?php

    include("footer.php");

?>