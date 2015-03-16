<?php

class SearchBar
{
    public function __construct()
    {

    }

    public function __toString()
    {
        return
        '<nav class="navbar navbar-default center" role="navigation" style="margin-left: 10%; margin-right: 10%">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Search Bar</a>
                </div>

                    <div class="col-sm-3 col-md-3 pull-right">
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

            </nav>';




       /*'<div class="container">
                <div class="row">
                    <div class="navbar navbar-default" role="navigation">

                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <div class="span6 center">
                                <form class="navbar-form" role="search" method="get" id="search-form" name="search-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter Search Term" id="query" name="query" value="">
                                            <div class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                                        </div>
                                    </div>

                                    <div class="nav navbar-nav">
                                        <div class="input-group"><a href="#" class="btn btn-warning">Search</a></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		</div>';*/


    }



}


?>