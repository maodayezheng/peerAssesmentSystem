<?php

class SearchBar
{
    // SearchBar is the same object every single time. No need to assign instance variables.
    // Only need to define the __toString() method so it can be echoed out easily.
    public function __construct() { }

    public function __toString()
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


/*            '<nav class="navbar navbar-default center" role="navigation" style="margin-left: 10%; margin-right: 10%; margin-bottom: 0px;">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Search the Forum</a>
                </div>

                    <div class="col-sm-5 col-md-5 pull-right" style="margin-right: 0px; padding-right: 5px;">
                        <form class="navbar-form" role="search" style="margin-right: 0px; padding-right: 1px;">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="searchQuery">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                                <select name="searchFilter" class="form-control">
                                    <option value="WholeForum">Whole Forum</option>
                                    <option value="ThreadTitlesOnly">Thread Titles Only</option>
                                    <option value="PostsOnly">Posts Only</option>
                                    <option value="GroupMembersOnly">Threads Including Group Member</option>
                                </select>
                            </div>
                        </form>
                    </div>

            </nav>';*/
    }
}


?>