<?php
/**
 * This file dynamically generates the forum for a group.
 */
?>
<!-- The Forum -->
<div class="container" style="margin-top: 10px">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <table>
                <tr>
                    <th style="font-size: 20px;" >
                        <div style="float:left; width=50%;">
                            <?php
                            echo 'Welcome '. htmlspecialchars($_SESSION["userName"]).' to Group '.
                                htmlspecialchars($_SESSION["peergroup"]).'\'s Discussion Forum';
                            ?>
                        </div>
                    </th>
                </tr>
            </table>
        </div>

        <!-- Table containing each thread for the group. -->
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th style="text-align: center; font-size: 20px; width: 80%" >
                    Forum Threads</th>
                <th style="text-align: center; font-size: 20px; width: 20%">

                    <?php include("pageSnippets/forum/createNewThreadButton.html"); ?>

                </th>
            </tr>
            </thead>
            <tbody>

            <?php include ("pageSnippets/forum/ForumTable.php")?>

            </tbody>
        </table>
    </div>
</div>

