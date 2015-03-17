<?php

class SearchBar
{
    private $_page;

    // SearchBar is different depending on which page it is used.
    public function __construct($page)
    {
        $this->_page = $page;
    }

    public function __toString()
    {
        if($this->_page === "forum")
        {
            return

                '<!-- Search Box -->
            <div class="container" style="margin-bottom: 0px; padding-bottom: 0px;">
                <div class="panel panel-default" id="searchBlock" style="margin-bottom: 0px; padding-bottom: 0px;">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <form action="forumSearch.php" method="post">
                                <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="searchQuery">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </div>
                                            <select name="filter" class="form-control">
                                                <option value="WholeForum">Whole Forum</option>
                                                <option value="ThreadTitlesOnly">Thread Titles Only</option>
                                                <option value="PostsOnly">Posts Only</option>
                                                <option value="GroupMembersOnly">Threads Including Group Member</option>
                                            </select>
                                        </div>

                            </form>
                        </h4>
                    </div>
                </div>
                </div>';
        }
        else if($this->_page === "admin")
        {
            return

                '<!-- Search Box -->
            <div class="container" style="margin-bottom: 0px; padding-bottom: 0px;">
                <div class="panel panel-default" id="searchBlock" style="margin-bottom: 0px; padding-bottom: 0px;">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <form action="forumSearch.php" method="post">
                                <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search For a Student" name="searchQuery">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </div>

                                        </div>

                            </form>
                        </h4>
                    </div>
                </div>
                </div>';
        }







    }
}


?>