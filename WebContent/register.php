
	<?php
			include("header.php"); 
			include("navbar.php")
			?>

<form class="form-horizontal" action='PHP/newAccount.php' method="POST">
	<div class="container-fluid">
		<section class="container">
			<div class="container-page">
				<div class="col-md-6">
					<h3 class="dark-grey">Registration</h3>

					<div class="form-group col-lg-12">
						<label>Username</label> <input type="" name="username"
							class="form-control" id="" value="">
					</div>

					<div class="form-group col-lg-12">
						<label>First Name</label> <input type="" name="fname"
							class="form-control" id="" value="">
					</div>

					<div class="form-group col-lg-12">
						<label>Last Name</label> <input type="" name="lname"
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

				</div>

				<div class="col-md-6">
					<input type="submit" name="submit" value="Register" class="btn btn-primary">
				</div>
			</div>
		</section>
	</div>
</form>

</html>