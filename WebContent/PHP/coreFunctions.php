<?php
/**
 * This script is intended to be required at the top of a page. It contains core functionality for use within
 * each page such as checking if the user is logged in or whether they have the right permissions.
 */

    function isLoggedIn()   { return isset($_SESSION["username"]);            }
    function userIsAdmin()  { return $_SESSION["accountType"] === "admin";    }
    function hasPeerGroup() { return isset($_SESSION["peergroup"]);           }


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


?>