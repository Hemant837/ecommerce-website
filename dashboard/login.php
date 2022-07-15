<!DOCTYPE html>

<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color:#f9f9f9;height:100%">

	<?php
	include_once("include/header.php");
	$error = '';
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$select = "select * from user_master where email= '$email' AND pass='$pass'";
		$run = mysqli_query($con, $select);
		$row = mysqli_num_rows($run);
		if ($row > 0) {
			echo "<script>window.open('index.php','_self')</script>";
			$row_user = mysqli_fetch_array($run);
			$_SESSION['user_name'] = $row_user['name'];
			$_SESSION['user_id'] = $row_user['ID'];
		} else {
			// echo 'error';
			$error = "<h5 class='text-center' style='color:red'pt-3>  Something Went Wrong </h5>";
		}
	}


	?>
	<div class="row mt-3">
		<div class="col-xs-0 col-lg-2"></div>
		<div class="col-xs-12 col-lg-8 pl-8 pr-8 ">
			<fieldset class="login-form">
				<div class="row mt-3" style="padding:70px 0px">
					<div class=" col-sm-12">
						<h1 class="text-center heading w-100" style="color: #05053d;"> <b>
								<h3> LOGIN WITH EMAIL<h3>
							</b> </h1>
					</div>
					<div class=" col-sm-12">
						<form method="post">
							<div class="form-group">
								<div class="row mt-4 mb-3">
									<div class=" col-sm-3"></div>
									<div class=" col-sm-6"><input type="email" class="form-control" name="email" placeholder="Email" required></div>
								</div>
								<div class="row mb-5">
									<div class=" col-sm-3"></div>
									<div class=" col-sm-6"><input type="password" class="form-control" name="pass" placeholder="Password" required></div>
								</div>
								<div class="row mb-4">
									<div class=" col-sm-4"></div>
									<div class=" col-sm-4">
										<button class="btn btn-light btn-lg btn-block mb-2" style="color:#fff;background-color:#ff69b4;" type="submit" name="submit">
											<h6> LOGIN </h6>
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</fieldset>
		</div>
	</div>







	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>