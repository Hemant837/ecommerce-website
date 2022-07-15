<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Card</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<?php
	include_once('include/header.php');
	$user_id = $_SESSION['user_id'];
	$select = "select * from products join add_to_cart on products.ID = add_to_cart.product_id where add_to_cart.user_id='$user_id'";
	$run = mysqli_query($con, $select);

	//for Update
	if (isset($_POST['cart'])) {
		$pro_id = $_POST['pro_id_hidden'];
		$quantity = $_POST['quantity'];
		$user_id = $_SESSION['user_id'];
		echo $st = $_POST['st'];

		$row = mysqli_fetch_array($run);

		echo $sub_total = $quantity * $st;
		// exit;
		$update = "update add_to_cart set quantity = $quantity ,sub_total_price = $sub_total  where product_id=$pro_id AND user_id =$user_id";
		$run = mysqli_query($con, $update);
		if ($run > 0) {
			echo "<script>window.open('add_to_cart.php','_self')</script>";
		}
	}
	//for deleting
	if (isset($_GET['del'])) {
		$get_pro_id = $_GET['del'];
		$user_id = $_SESSION['user_id'];
		$delete = "delete from add_to_cart where product_id= $get_pro_id AND user_id=$user_id";
		$run = mysqli_query($con, $delete);
		if ($run > 0) {
			echo "<script>window.open('add_to_cart.php','_self')</script>";
		}
	}
	?>
	<fieldset class="add-form">
		<div class="row  mb-5  mr-5" style="padding:70px 0px">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-lg-12 col-xl-12 col-md-12">
						<h1 class="text-center heading"> <b> ADD TO CART </b> </h1>

						<table class="table table-borderd table-hover">
							<thead>
								<tr>
									<th>
										<h5> <i> <b> Product Title </i> </b> </h5>
									</th>
									<th>
										<h5> <i> <b> Image</i> </b> </h5>
									</th>
									<th>
										<h5> <i> <b> Price </i> </b> </h5>
									</th>
									<th>
										<h5> <i> <b> Quantity </i> </b> </h5>
									</th>
									<th>
										<h5> <i> <b>Sub Total </i> </b> </h5>
									</th>
									<th>
										<h5> <i> <b> Action </i> </b> </h5>
									</th>
								</tr>
							</thead>

							<?php
							while ($row = mysqli_fetch_array($run)) { ?>

								<form method="post">
									<tr>
										<td> <?php echo $row['Product_Title'];
												?> </td>
										<td> <img src="assets/images/<?php echo $row['Imag']; ?>" width="80" height="80" /> </td>
										<td> <?php echo $row['Price']; ?> </td>

										<td>
											<input type="hidden" name="pro_id_hidden" value="<?php echo $row['product_id']; ?>" />
											<select name="quantity">
												<?php
												for ($i = 1; $i <= 10; $i++) { ?>
													<option <?php if ($i == $row['quantity']) {
																echo "selected";
															} ?> value="<?php echo $i; ?>"> <?php echo $i; ?> </option>
												<?php  }
												?>
											</select>
										</td>
										<td> <?php echo $st = $row['Price'] * $row['quantity']; ?>
											<input type="hidden" name="st" value="<?php echo $row['Price'] * $row['quantity']; ?>" />
										</td>
										<td>
											<button type="submit" name="cart" class="btn btn-primary btn-sm">Update</button>
											<a href="add_to_cart.php?del=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm"> Delete </a>
										</td>
									</tr>
								</form>
							<?php }

							?>
							<!-- *************************************************************** -->
							<!--total amount  -->
							<!-- *************************************************************** -->

							<tr>
								<td colspan="4" align="right">
									<h5> <b> TOTAL - </b></h5>
								</td>
								<td> <?php
										$select_sum = "select sum(sub_total_price) as sub_total_price from add_to_cart where user_id='$user_id'";
										$run_sum = mysqli_query($con, $select_sum);
										$row = mysqli_fetch_assoc($run_sum);
										echo $row['sub_total_price'];
										?>
								</td>

							</tr>
							<tr>
								<!-- *************************************************************** -->
								<!--Check Out  -->
								<!-- *************************************************************** -->
								<td colspan="6" align="center">
									<div>
										<a class="btn btn-light btn-lg btn-block mb-2" href="https://www.phonepe.com/" target="_blank" style="color:#fff;background-color:#ff69b4;" type="submit" name="submit">
											<h6> CHECK OUT </h6>
										</a>
									</div>

								</td>

							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</fieldset>

	<?php
	include_once('include/footer.php');
	?>
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>

</html>