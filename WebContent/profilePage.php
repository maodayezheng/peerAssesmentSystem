<?php
    require_once("PHP/DBConnection.php");
    session_start();
    include ("header.php");
    include ("navbar.php");

    if(!isset($_SESSION ["userName"]))
    {
        echo '<script>alert("You are not logged in"); </script>';

    } else
    {
        $userName = $_SESSION ["userName"];

        $getUserDetailsSQL = "SELECT fName, lName, sex, accountType, peergroup
                              FROM account
                              WHERE userName=?";

        $preparedStatement  = $conn->stmt_init();
        $preparedStatement  = $conn->prepare($getUserDetailsSQL);
        $preparedStatement->bind_param('s', $userName);
        $result              = $preparedStatement->execute(); // Will be a boolean
        $resultSet           = $preparedStatement->get_result();

        if($result)
        {
            $preparedStatement->store_result();
            $row = $resultSet->fetch_array(MYSQLI_ASSOC); //Fetch the resultSet as an associativeArray.

            $fName          = $row["fName"];
            $lName          = $row["lName"];
            $sex            = $row["sex"];
            $accountType    = $row["accountType"];
            $peerGroup      = $row["peergroup"];


    $dynamicPage = <<< EOD
    <div style="padding-top:20px; padding-left:700px" class="col-md-9">
    <div class="container-fluid well span6">
        <div class="row-fluid">
            <div class="span2" >
                <img align="middle" class= "img-circular" src="http://vignette2.wikia.nocookie.net/southpark/images/f/f5/1008_cartman_bigger.jpg/revision/latest?cb=20100602173322" height="150" width="150">
            </div><br>

                      <table class="table table-user-information">
                        <tbody>
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
                      </table>

            <div class="span2">
                <div class="btn-group">
                    <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                        Action
                        <span class="icon-cog icon-white"></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="icon-wrench"></span> Edit Info</a></li>
                    </ul>
                </div>
            </div>
    </div>
    </div>
    </div>
    </body>
    </html>
EOD;
            echo $dynamicPage;
        }
    }
?>