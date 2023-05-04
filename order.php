<?php
include 'session.php';

// check if user is logged in
if (!isset($_SESSION['login_user'])) {
	header('Location: ./login_page/login.php');
	exit;
}

if (isset($_POST['submit'])) {
	// include database connection
	include 'connect.php';


	// get product id and quantity from form
	$product_id = $_POST['product_id'];
	$quantity = $_POST['quantity'];
	$email = $_POST['quantity'];
	$phone = $_POST['phone'];
	$location = $_POST['shipping_address'];


	// insert order into database
	$user_id = $login_id;


	$sql = "INSERT INTO orders (userId, productId, orderQuantity, orderEmail, orderPhone, orderLocation) 
					VALUES ('$user_id', '$product_id', '$quantity', '$email', '$phone', '$location')";
	$result = mysqli_query($con, $sql);
	// redirect to order confirmation page
	if ($result) {

		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Product Uploaded Successfully!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';

		header('Refresh: 2; URL= index.php');
	}

}

?>
<!DOCTYPE html>
<html>

	<head>
		<title>Place Order</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>

	<body>
		<?php include 'userNav.php' ?>
		<div class="container">
			<h2>Place Order</h2>
			<form method="POST" action="">
				<div class="form-group">
					<!-- <label for="product_id">Product ID:</label> -->
					<input type="hidden" class="form-control" id="product_id" name="product_id"
						value="<?php echo $_POST['productId'] ?>">
				</div>
				<div class="form-group">
					<label for="product_id">Email:</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="product_id">Contact Number:</label>
					<input type="text" class="form-control" id="phone" name="phone" required>
				</div>
				<div class="form-group">
					<label for="quantity">Quantity:</label>
					<input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
				</div>
				<div class="form-group">
					<label for="shipping_address">Shipping Address:</label>
					<textarea class="form-control" id="shipping_address" name="shipping_address" required></textarea>
				</div>
				<button type="submit" class="btn btn-info" name="submit">Place Order</button>
				<a href="products.php" class="btn btn-secondary">Back to Products</a>
			</form>
		</div>
	</body>

</html>