<?php

    include ("header.php");
    include ("navbar.php");

?>

<div class="container">
    <div role="tabpanel">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">Text on home</div>
            <div role="tabpanel" class="tab-pane" id="profile">Text on profile</div>
            <div role="tabpanel" class="tab-pane" id="messages">Text on messages</div>
            <div role="tabpanel" class="tab-pane" id="settings">Text on settings</div>
          </div>

    </div>

    <?php
        include ("footer.php");
    ?>

</div>
</html>