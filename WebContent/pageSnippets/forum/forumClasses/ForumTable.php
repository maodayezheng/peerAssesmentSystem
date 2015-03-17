<?php

class ForumTable
{
    // The object can either be a table showing thread titles only, or all of the posts in a single thread.
    private $_tableType,
    // An array containing the userName, and peerGroup of the user requesting the table.
            $_userInfo,
    // An array of threadIDs is passed to the constructor which generates a table containing these threads.
            $_threadIDs,
    // A link to the DB.
            $_db,
    // Array containing basic info about the thread being displayed
            $_threadData;

    public function __construct($db, $tableType, $userInfo, $threadIDs)
    {
        $this->_tableType   = $tableType;
        $this->_userInfo    = $userInfo;
        $this->_threadIDs   = $threadIDs;
        $this->_db          = $db;
        if($this->_tableType === "posts")      { $this->populateThreadDataInstanceVariable(); }


    }

    public function __toString()
    {
       return $this->generateTable();
    }

    private function generateThreadListingTable()
    {
        $table =
        '
        <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;}
        .tg .tg-shvy{font-weight:bold;background-color:#337ab7; font-size: 16px; text-align: center; }
        </style>
        <table class="tg" style="width: 100%;">
          <tr>
            <th class="tg-shvy">Thread Title</th>
            <th class="tg-shvy">Author</th>
            <th class="tg-shvy">Date Created</th>
          </tr>';

        $table .= $this->threadListingTableQuery();
        $table .= '</table>';

        return $table;
    }

    // This generates the rows for the table if the user is requesting to view their entire group's forum.
    private function threadListingTableQuery()
    {
        $groupNumber    = $this->_userInfo["peergroup"];

        $getGroupThreadsSQL = "SELECT *
                               FROM forumthreads
                               WHERE `peergroup` =?
                               ORDER BY 'date' ASC";
        $preparedStatement  = $this->_db->stmt_init();
        $preparedStatement  = $this->_db->prepare($getGroupThreadsSQL);
        $preparedStatement->bind_param('i', $groupNumber); // i because $groupNumber should be an integer.
        $preparedStatement->execute();

        $result = $preparedStatement -> get_result();

        $tableRows = ""; //Will be building this up.

            //In $result === false or num rows = 0 then no results were found
        if ( ($result === FALSE) || ($result->num_rows === 0) )
        {
        $tableRows .= '<tr>
                        <td colspan="3" style="text-align: left; font-size: 20px;">
                             Your group\'s forum is currently empty. <br />
                             Click "Create a thread" to start posting!
                        </td>
                      </tr>';
        } else
        {
            while ($row = $result->fetch_assoc())
            {
                // Columns in forumthreads table: (threadID, peergroup, threadTitle, threadAuthor, dateTimeCreated)
                // Encoding data received from the database using htmlentities. This will turn any character with a corresponding
                // html representation e.g. '<' will be changed to '&lt;' to prevent potential inclusion on <script> tags>
                $threadVariables = array
                (
                    "threadID"          => htmlentities($row["threadID"]),
                    "threadTitle"       => htmlentities($row["threadTitle"]),
                    "threadDate"        => htmlentities($row["dateTimeCreated"]),
                    "threadAuthor"      => htmlentities($row["threadAuthor"])
                );

                $tableRows .="<tr>
                                <td class=\"tg-031e\"><a href=\"viewSingleThread.php?threadID={$threadVariables["threadID"]}\"> {$threadVariables["threadTitle"]} </a></td>
                                <td class=\"tg-031e\"><a href=\"profilePage.php?userName={$threadVariables["threadAuthor"]}\"> {$threadVariables["threadAuthor"]} </a></td>
                                <td class=\"tg-031e\"> {$threadVariables["threadDate"]} </td>
                              </tr>";
            }
        }
        return $tableRows;
    }

    // This function generates the rows of the table if the user is requesting to see a single thread.
    // In this case each row of the table will be a post in the thread.
    private function generateSingleThread()
    {
        $table =
            '
        <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#999;color:#333;background-color:#26ADE4;}
        .tg .tg-shvy{font-weight:bold;background-color: #f5f5f5; font-size: 16px; text-align: center; }
        </style>
        <table class="tg" style="width: 100%;">
          ';

        $table .= $this->singleThreadQuery();
        $table .= '</table>';

        return $table;
    }

    private function singleThreadQuery()
    {
        $getAllPostsInThreadSQL = "SELECT *
                                   FROM forumposts
                                   WHERE threadID=?
                                   ORDER BY `date` ASC";
        $preparedStatement  = $this->_db->stmt_init();
        $preparedStatement  = $this->_db->prepare($getAllPostsInThreadSQL);
        $preparedStatement->bind_param('i', $this->_threadIDs["sanitisedThreadID"]); // i because threadID should be an integer.
        $preparedStatement->execute();

        $result = $preparedStatement -> get_result();

        $tableRows = ""; //Will be building this up.

        //In $result === false or num rows = 0 then no results were found
        if ( ($result === FALSE) || ($result->num_rows === 0) )
        {
            $tableRows .= '<tr>
                        <td colspan="3" style="text-align: left; font-size: 20px;">
                             There are currently no posts in this thread.  <br />
                             Click "Create a new post" to start posting!
                        </td>
                      </tr>';
        } else
        {
            while ($row = $result->fetch_assoc())
            {
                // Columns in forumposts table: (postID, threadID, author, date, content)
                // Encoding data received from the database using htmlentities. This will turn any character with a corresponding
                // html representation e.g. '<' will be changed to '&lt;' to prevent potential inclusion of <script> tags>
                $threadPost = array
                (
                    "postAuthor"    => htmlentities($row["author"]),
                    "postDate"      => htmlentities($row["date"]),
                    "postContent"   => htmlentities($row["content"])

                );

                $tableRows .="<tr>
                                <th class=\"tg-shvy\">Post Author:</th>
                                <th class=\"tg-shvy\">Post Date:</th>
                                <th class=\"tg-shvy\">Post Content:</th>
                              </tr>
                             <tr>
                                <td class=\"tg-031e\" style=\"text-align: center;\"> <a href=\"profilePage.php?userName={$threadPost["postAuthor"]}\"> {$threadPost["postAuthor"]} </a>  </td>
                                <td class=\"tg-031e\" style=\"text-align: center;\"> {$threadPost["postDate"]} </td>
                                <td class=\"tg-031e\"> {$threadPost["postContent"]} </td>
                              </tr>";
            }
        }
        return $tableRows;
    }



    private function generateTable()
    {
        // In this case there is no thread with the threadID passed to the URL.
        if( ($this->_tableType === "posts") && ($this->_threadData === null) )
        {
            return
                '<!-- The Forum -->
            <div class="container" style="">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <table>
                <tr>
                    <th style="font-size: 20px;" colspan="2">
                        <div  style="width=100%;" align="center">
                        No thread exists for the threadID: '. $this->_threadIDs["sanitisedThreadID"] .
                    '</div>
                    </th>
                </tr>
                </table>
                </div>';
        }

        $table =
            '<!-- The Forum -->
            <div class="container" style="">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <table>
                    <tr>
                        <th style="font-size: 20px;" colspan="2">
                            <div  style="width=100%;" >';

                if($this->_tableType === "searchResults")
                {
                    $table .= "Showing search results for query <span style=\"font-style: italic;\">
                                '".$this->_userInfo["searchQuery"]."'</span>
                                with filter: <span style=\"font-style: italic;\">".$this->_userInfo["filter"].'</span>';
                }
                else
                {
                    $table .= 'Welcome ' . htmlspecialchars($this->_userInfo["userName"]) . ' to Group ' .
                        htmlspecialchars($this->_userInfo["peergroup"]) . '\'s Discussion Forum';
                }

        $table .=
                            '</div>
                        </th>
                    </tr>
                    </table>
                </div>

            <!-- Table containing each thread visible to the user. -->
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th style="text-align: center; font-size: 20px; width: 80%" >';

                        if($this->_tableType === "threads")      { $table .= "Forum Threads"; }
                        else if($this->_tableType === "posts")
                        {
                            $table .= 'Thread Title: <span style="font-style: italic;">'.$this->_threadData["threadTitle"].'</span>';
                        }

        $table .= '</th>
                    <th style="text-align: center; font-size: 20px; width: 20%">';

                        if($this->_tableType === "threads")      { $table .= $this->createNewThreadButton(); }
                        else if($this->_tableType === "posts")   { $table .= $this->createNewPostButton();   }

        $table .= ' </th>
                </tr>
                </thead>
                <tbody>';

        if($this->_tableType === "threads")      { $table .= $this->generateThreadListingTable(); }
        else if($this->_tableType === "posts")   { $table .= $this->generateSingleThread();       }

        $table .= '</tbody>
            </table>
            </div>
            </div>';

        return $table;
    }


    public function createNewPostButton()
    {
        $threadID = $this->_threadIDs["sanitisedThreadID"];

        return
        ' <!-- Pop up box when creating a new post within a thread -->
        <a href="#createNewPostInThread" data-toggle="modal" data-target="#createNewPostInThread" class="btn btn-primary btn-bg pull-center">
                Create A New Post
            </a>

            <form action="pageSnippets/forum/forumActions/createNewPost.php" method="POST" role="form">

                <div class="modal fade" id="createNewPostInThread" tabindex="-1" role="dialog" aria-labelledby="createNewPostInThread" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Create A New Post </h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div>
                                        <h4>
                                            <b>Post:</b>
                                        </h4>
                                                <textarea name="content" id="content" max="10000" rows="5" cols="50"
                                                          placeholder="Write your post here" style="height: 350px; width: 100%;"></textarea>
                                                <input type="hidden" name="threadID" value="'.$threadID.'>"
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>';
    }


    private function createNewThreadButton()
    {
        return
                '<!-- Pop up box when creating a new thread -->
        <a href="#createNewThread" data-toggle="modal" data-target="#createNewThread" class="btn btn-primary btn-bg pull-center">
            Create New Thread
            </a>

        <form action="pageSnippets/forum/forumActions/createNewThread.php" method="POST" role="form" id="createNewThreadForm">

            <div class="modal fade" id="createNewThread" tabindex="-1" role="dialog" aria-labelledby="createNewThread" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Create A New Thread </h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel-body">

                                <div>
                                    <h4>
                                        <b>Thread Title:</b>
                                    </h4>
                                    <input name="title" id="title" max="50" rows="1" cols="50" placeholder="Title:" style="width: 100%;" required>
                                    <br>
                                </div>

                                <div>
                                    <h4>
                                        <b>Content:</b>
                                    </h4>
                                            <textarea name="content" id="content" max="10000" rows="5" cols="50"
                                                      placeholder="Write your post here" style="height: 350px; width: 100%;" required></textarea>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>';
    }

    private function populateThreadDataInstanceVariable()
    {
        $groupNumber    = $this->_userInfo["peergroup"];
        $threadID       = $this->_threadIDs["sanitisedThreadID"];

        $getSingleThreadData = "SELECT *
                                FROM forumthreads
                                WHERE `peergroup` =?
                                AND `threadID` =?";
        $preparedStatement  = $this->_db->stmt_init();
        $preparedStatement  = $this->_db->prepare($getSingleThreadData);
        $preparedStatement->bind_param('ii', $groupNumber, $threadID); // i because $groupNumber should be an integer.
        $preparedStatement->execute();

        $result = $preparedStatement -> get_result();

        $tableRows = ""; //Will be building this up.

        //In $result === false or num rows = 0 then no results were found
        if ( ($result === FALSE) || ($result->num_rows === 0) )
        {
            $this->_threadData = null;

        } else
        {
            while ($row = $result->fetch_assoc())
            {
                // Columns in forumthreads table: (threadID, peergroup, threadTitle, threadAuthor, dateTimeCreated)
                // Encoding data received from the database using htmlentities. This will turn any character with a corresponding
                // html representation e.g. '<' will be changed to '&lt;' to prevent potential inclusion on <script> tags>
                $this->_threadData = array
                (
                    "threadID"          => htmlentities($row["threadID"]),
                    "threadTitle"       => htmlentities($row["threadTitle"]),
                    "threadDate"        => htmlentities($row["dateTimeCreated"]),
                    "threadAuthor"      => htmlentities($row["threadAuthor"])
                );
            }
        }
    }

}



?>