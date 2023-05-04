<?php
// Connect to the database
include 'connect.php';

// Get the ID of the selected product
$product_id = $_GET['id'];

// Query the database for the product with this ID
$sql = "SELECT * FROM products WHERE productId = $product_id";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if (mysqli_num_rows($result) > 0) {
	// The query was successful, so display the product data
	$product = mysqli_fetch_assoc($result);
} else {
	// The query was not successful, so display an error message
	echo "Error: No product found with ID $product_id";
}
?>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Product View </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
	</head>

	<body>
		<?php
		if (isset($login_session) && $login_session != "") {
			include 'userNav.php';
		} else {
			include 'navBar.php';
		}
		?>
		<div class="container my-5">
			<div class="row">
				<div class="col-md-6">
					<img style="pointer-events: none; user-select: none;" src="<?php echo $product['productImage']; ?>"
						alt="<?php echo $product['name']; ?>" class="img-fluid">
				</div>
				<div class="col-md-5 shadow p-3">
					<h1>
						<?php echo $product['productName']; ?>
					</h1>
					<p>
						<?php echo $product['productDescription']; ?>
					</p>
					<p><strong>Price:</strong> BDT
						<?php echo $product['productPrice']; ?>
					</p>
					<form action="add-to-cart.php" method="post">
						<input type="hidden" name="id" value="<?php echo $product['productId']; ?>">
						<button type="submit" class="btn btn-info order-btn">Order</button>
					</form>
					<a href="index.php" class="btn btn-info order-btn">Go Home</a>
				</div>
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
	</body>

</html>