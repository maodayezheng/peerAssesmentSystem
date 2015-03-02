
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

					<div class="form-group col-lg-8">
						<label>Password</label> <input type="password" name="password"
							class="form-control" id="" value="">
					</div>

					<div class="form-group col-lg-8">
						<label>Account Type</label> <input type="" name="accounttype"
							class="form-control" id="" value="">
					</div>


					<!--  <div class="col-sm-6">
          <input type="checkbox" class="checkbox" />Send email notifications 
        </div>    -->

				</div>

				<div class="col-md-6">
					<h3 class="dark-grey">Terms and Conditions</h3>
					<p>By clicking on "Register" you agree to Peer System's Terms and
						Conditions</p>
					<p>While rare, prices are subject to change based on exchange rate
						fluctuations - should such a fluctuation happen, we may request an
						additional payment. You have the option to request a full refund
						or to pay the new price. (Paragraph 13.5.8)</p>
					<p>Should there be an error in the description or pricing of a
						product, we will provide you with a full refund (Paragraph 13.5.6)
					</p>
					<p>Acceptance of an order by us is dependent on our suppliers
						ability to provide the product. (Paragraph 13.5.6)</p>

					<input href="" type="submit" name="submit"
						value="Send" class="btn btn-primary"></input>
				</div>
			</div>
		</section>
	</div>
</form>

</html>