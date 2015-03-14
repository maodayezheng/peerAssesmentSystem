<!-- Pop up box when creating a new post -->
<?php
    $threadID = $includeNewPostButtonVariables["threadID"];
?>
<a href="#createNewPostInThread<?php echo $threadID; ?>" data-toggle="modal" data-target="#createNewPostInThread<?php echo $threadID; ?>" class="btn btn-primary btn-bg pull-center">
    Create A New Post
</a>

<form action="pageSnippets/forum/createNewPost.php" method="POST" role="form">

    <div class="modal fade" id="createNewPostInThread<?php echo $threadID; ?>" tabindex="-1" role="dialog" aria-labelledby="createNewPostInThread<?php echo $threadID; ?>" aria-hidden="true">
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
                                    <input type="hidden" name="threadID" value="<?php echo $threadID; ?>"
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
</form>