<!-- Pop up box when creating a new post -->
<a href="#createNewPost" data-toggle="modal" data-target="#createNewPost" class="btn btn-primary btn-bg pull-center">
    Create A New Post
</a>

<form action="pageSnippets/forum/createNewPost.php" method="POST" role="form">

    <div class="modal fade" id="createNewPost" tabindex="-1" role="dialog" aria-labelledby="createNewPost" aria-hidden="true">
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
                            <br>
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
</form>