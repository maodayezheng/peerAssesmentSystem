
	<?php
			include("header.php"); 
			include("navbar.php");
            require("PHP/newAccount.php");

	?>



    <div class="container" style="background-color: white; ">

        <div class="page-header col-lg-offset-3">
            <h1>Registration form for students</h1>
        </div>

        <!-- Registration form - START -->
        <div class="container col-lg-offset-3">
            <div class="row">
                <form role="form" action='register.php' method="POST">
                    <div class="col-lg-6">


                    <?php
                        if(isset($_POST['submit']))
                        {
                            if(!empty($validation)) //if the errors array is non-empty display the errors to the user.
                            {
                                $errors  = '<div class="well well-sm"> <span style="color: red;"><strong>Error: </strong></span>';
                                $errors .= '<ul>';
                                foreach($validation as $rule => $value) { $errors .= "<li> $value </li>"; }
                                $errors .= '</ul></div>';
                                echo $errors;
                            }
                        }
                    ?>




                        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                        <div class="form-group">
                            <label for="userName">Enter Desired User Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="userName" id="userName" placeholder="Enter Desire User Name" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fName">Enter First Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="fName" id="fName" placeholder="Enter Your First Name" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lName">Enter Surname</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="lName" id="lName" placeholder="Enter Your Surname" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sex">Choose Gender</label>
                            <select name="sex" style="width: 100%;">
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Enter Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Enter Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Your Password" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-center">

                        </div>
                    </div>

                </form>



            </div>
        </div>
        <!-- Registration form - END -->

    </div>



<!--
    <form class="form-horizontal" action='PHP/newAccount.php' method="POST">
        <div class="container-fluid">
            <section class="container">
                <div class="container-page">
                    <div class="col-md-6">
                        <h3 class="dark-grey">Registration</h3>

                        <div class="form-group col-lg-12">
                            <label>Username</label> <input type="" name="userName"
                                class="form-control" id="" value="">
                        </div>

                        <div class="form-group col-lg-12">
                            <label>First Name</label> <input type="" name="fName"
                                class="form-control" id="" value="">
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Last Name</label> <input type="" name="lName"
                                class="form-control" id="" value="">
                        </div>

                        <div class="form-group col-lg-12">
                            <label>Sex</label>
                            <select name="sex" style="width: 100%;">
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-8">
                            <label>Password</label> <input type="password" name="password"
                                class="form-control" id="" value="">
                        </div>

                        <div class="form-group col-lg-8">
                            <label>Confirm Password</label> <input type="password" name="confirmPassword"
                                                           class="form-control" id="" value="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <input type="submit" name="submit" value="Register" class="btn btn-primary">
                    </div>
                </div>
            </section>
        </div>
    </form>-->

</html>