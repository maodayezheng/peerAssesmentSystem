<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		       <a href="index.php">
                   <img src="img/logo.png" alt="PeerSystem Logo" style="height: 50px"/>
                   <!-- <img src="img/letter-p.png"  alt="Mountain View" style="width:50px;height:50px" >
                   <img src="img/letter-s.png"  alt="Mountain View" style="width:50px;height:50px" > -->
               </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <!-- The search option is only needed if you are on the forum page. -->
        <?php
            $script_navbar_contained_in = basename($_SERVER["REQUEST_URI"], ".php");
            if(strcmp($script_navbar_contained_in, 'forumPage') == 0) //returns 0 if the two strings are equal.
            {
                echo ' <div class="collapse navbar-collapse" id = "bs-example-navbar-collapse-1" >
                      <ul class="nav navbar-nav" >
                        <form style = "padding-left:350px;" class="navbar-form navbar-left" role = "search" >
                        <div class="form-group" >
                           <div class="input-group" >
                      <input type = "text" class="form-control" aria - label = "..." placeholder = "Search" >


                        </div >
                        <button type = "button" class="btn btn-default" > Search <span class="glyphicon glyphicon-search" ></span ></button >
                      </form >
                      </ul >';
            }
        ?>


		      <ul class="nav navbar-nav navbar-right">
		      	<li><a href="#">Profile</a></li>
		        <li><a href="PHP/logout.php">LogOut</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
</nav>