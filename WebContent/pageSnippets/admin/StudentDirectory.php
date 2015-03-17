<?php

class StudentDirectory
{
    private $_directoryType;

    public function __construct($db, $tableType, $userInfo, $threadIDs)
    {
        $this->_tableType = $tableType;
        $this->_userInfo = $userInfo;
        $this->_threadIDs = $threadIDs;
        $this->_db = $db;
    }

    public function __toString()
    {
        return $this->generateTable();
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
        if( ($this->_tableType === "noSearchResults") )
        {
            return
                '<!-- The Directory -->
            <div class="container" style="">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <table>
                <tr>
                    <th style="font-size: 20px;" colspan="2">
                        <div  style="width=100%;" align="center">
                        We found no matches for your search
                </div>
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
            $table .= "Search Results for Query: <span style=\"font-style: italic;\">
                                '".$this->_userInfo["searchQuery"]."'</span>
                                with Filter: <span style=\"font-style: italic;\">".$this->_userInfo["filter"].'</span>';
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
        //else if($this->_tableType === "searchResults") { $table .= "Threads matching your search:"; }

        $table .= '</th>
                    <th style="text-align: center; font-size: 20px; width: 20%">';

        if($this->_tableType === "threads")      { $table .= $this->createNewThreadButton(); }
        else if($this->_tableType === "posts")   { $table .= $this->createNewPostButton();   }

        $table .= ' </th>
                </tr>
                </thead>
                <tbody>';

        if($this->_tableType === "threads")             { $table .= $this->generateThreadListingTable(null);                }
        else if($this->_tableType === "posts")          { $table .= $this->generateSingleThread();                          }
        else if($this->_tableType === "searchResults")  { $table .= $this->generateThreadListingTable($this->_threadIDs);   }

        $table .= '</tbody>
            </table>
            </div>
            </div>';

        return $table;
    }


    }


}


?>