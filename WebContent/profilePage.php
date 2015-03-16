<?php
    require_once("PHP/DBConnection.php");
    session_start();
    include ("header.php");
    include ("navbar.php");

    if(!isset($_SESSION["userName"]))
    {
        // In this case, the user is not logged in so they should not be able to see any profile page.
        echo '<p> You are not logged in, click <a href="login.php">here</a> to go to the log in page.</p>';

    } else
    {
        // In this case the user is logged in, and they are either requesting to see their profile page
        // or the profile page of another registered user. It is assumed that any logged in user can view
        // the profile of any registered user (student or admin).

        if( (isset($_GET["userName"])) && ($_GET["userName"] != ""))
        {
            // In this case a logged in user has requested to see the profile page of another user. They can only see
            // the details, and not edit them.

            // Since we are taking input from the user using $_GET, we need to sanitise it.
            // The following performs a case insensitive regular expression replace i.e. it replaces any character
            // that is not a letter or a number with the empty string ''.
            $getQuery       = preg_replace('#[^a-z 0-9]#i', '', $_GET["userName"]);
            $showEditButton = false;
        } else
        {
            // In this case you are viewing your own profile.
            $getQuery       = $_SESSION ["userName"];
            $showEditButton = true;
        }

        $getUserDetailsSQL = "SELECT userName, fName, lName, sex, accountType, peergroup
                              FROM account
                              WHERE userName=?";

        $preparedStatement  = $conn->stmt_init();
        $preparedStatement  = $conn->prepare($getUserDetailsSQL);
        $preparedStatement->bind_param('s', $getQuery);
        $result              = $preparedStatement->execute(); // Will be a boolean
        $resultSet           = $preparedStatement->get_result();

        if($result)
        {
            $preparedStatement->store_result();
            $row = $resultSet->fetch_array(MYSQLI_ASSOC); //Fetch the resultSet as an associativeArray.

            $userName       = $row["userName"];
            $fName          = $row["fName"];
            $lName          = $row["lName"];
            $sex            = $row["sex"];
            $accountType    = $row["accountType"];
            $peerGroup      = $row["peergroup"];


            $dynamicPage =
                            '<div style="padding-top:20px;" class="col-md-9">
                                <div class="container-fluid well span6">
                                    <div class="row-fluid">';

            if($showEditButton)
            {
                // Pop up box for when editing user details.
                $dynamicPage .=   '<a href="#editProfileDetails" data-toggle="modal" data-target="#editProfileDetails" class="btn btn-primary btn-bg pull-center">
                                                Edit Profile Details
                                                </a>
                                    <form action="pageSnippets/profilePage/editProfileDetails.php" method="POST" role="form" id="editProfileDetailsForm">

                                        <div class="modal fade" id="editProfileDetails" tabindex="-1" role="dialog" aria-labelledby="editProfileDetails" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Edit Profile Details</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel-body">
                                                            <div>
                                                                <input name="userName" id="userName" value="'.$userName.'" type="hidden">
                                                            </div>
                                                            <div>
                                                                <h4>
                                                                    <b>First Name:</b>
                                                                </h4>
                                                                <input name="firstName" id="firstName" value="'.$fName.'" max="50" rows="1" cols="50" placeholder="First Name:" style="width: 100%;" required>
                                                            </div>
                                                            <div>
                                                                <h4>
                                                                    <b>Last Name:</b>
                                                                </h4>
                                                                <input name="lastName" id="lastName" value="'.$lName.'" max="50" rows="1" cols="50" placeholder="First Name:" style="width: 100%;" required>
                                                            </div>
                                                            <div>
                                                                <h4>
                                                                    <b>Gender:</b>
                                                                </h4>
                                                                <select name="gender">';
                                                                if($sex === "male")
                                                                {
                                                                    $dynamicPage .= '<option value="male">male</option>
                                                                                     <option value="female">female</option>';
                                                                } else
                                                                {
                                                                    $dynamicPage .= '<option value="female">female</option>
                                                                                     <option value="male">male</option>';
                                                                }

                $dynamicPage .=

                                                                '</select>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success"
                                                >Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>';
            }


            $dynamicPage .=          '<br /><table class="table table-user-information" id="userInfo">'.
                                            "<tbody>
                                                    <tr>
                                                        <td>User Name:</td>
                                                        <td>$userName</td>
                                                      </tr>
                                                      <tr>
                                                        <td>First Name:</td>
                                                        <td>$fName</td>
                                                      </tr>
                                                       <tr>
                                                        <td>Last Name:</td>
                                                        <td>$lName</td>
                                                      </tr>
                                                      <tr>
                                                        <td>User Status:</td>
                                                        <td>$accountType</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Gender</td>
                                                        <td>$sex</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Group</td>
                                                        <td>$peerGroup</td>
                                                      </tr>
                                            </tbody>
                                        </table>";



            $dynamicPage .=
                                    '</div>
                                </div>
                            </div>
                        </body>
                </html>';


            echo $dynamicPage;
        }
    }
?>