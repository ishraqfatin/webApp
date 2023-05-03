<?php
// include('connect.php');
include("session.php");
include('delete.php');
if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
	header("Location: ./login_page/login.php");
	exit;
}

if (isset($_GET['search'])) {
	$searchTerm = $_GET['search'];

	// Build SQL query
	if ($searchTerm != "") {

		$sql = " select * from products WHERE userId='$login_id' and (productPrice LIKE '%$searchTerm%' OR productName LIKE '%$searchTerm%' OR productDescription LIKE '%$searchTerm%')";
	} else {
		$sql = "select * from products where userId='$login_id'";
	}

	// Execute query
	$result = mysqli_query($con, $sql);
} else {

	$sql = "select * from products where userId='$login_id'";
	$result = mysqli_query($con, $sql);
}

?>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>ARTISM</title>
		<link href="https://fonts.googleapis.com/css?family=Fraunces" rel="stylesheet" type="text/css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css" />
	</head>

	<body>
		<!--NAVIGATION BAR-->
		<?php
		if (isset($login_session) && $login_session != "") {
			include 'userNav.php';
		} else {
			include 'navBar.php';
		}
		?>
		<!--END OF NAVIGATION BAR-->
		<!--PRODUCTS SHOWCASE-->
		<div class="gallery" id="gallery">
			<?php if (isset($searchTerm) && $searchTerm != "") { ?>
				<h2 class="row justify-content-center">Results for "
					<?php echo $searchTerm ?>"
				</h2>
				<?php
			} else {
				?>
				<h2 class="row justify-content-center">My Arts</h2>
			<?php } ?>
			<div class="row row-cols-1 row-cols-md-3 g-2 p-2 justify-content-center">
				<?php
				while ($qq = mysqli_fetch_array($result)) {

					?>
					<div class="col">
						<a href="" class="card-link">
							<div class="card h-100">
								<?php
								echo '<img class="card-img-top img-fluid" alt="Product Image" src="' . $qq['productImage'] . '" />';
								?>
								<div class="card-body">
									<h5 class="card-title">
										<?php echo $qq['productName']; ?>
									</h5>
									<p class="card-subtitle mb-2 text-body-secondary">by<a href="#" class="name-link">
											<?php
											echo $login_session;
											?>
										</a>
									</p>
									<p class="card-text">
										<?php echo $qq['productDescription']; ?>
									</p>
									<p class="blockquote mb-0">BDT
										<?php echo $qq['productPrice'] ?>
									<p class="card-subtitle mb-2 text-body-secondary">In Stock:
										<?php echo $qq['productQuantity'] ?>
									</p>
									</p>
									<div class="d-flex gap-2">
										<form action="delete.php" method="post">
											<input type="hidden" name="id" value="<?php echo $qq['productId'] ?>">
											<input type="submit" class="btn btn-danger" name="delete" value="Delete">
										</form>
										<form action="updateProduct.php" method="post">
											<input type="hidden" name="id" value="<?php echo $qq['productId'] ?>">
											<input type="submit" class="btn btn-dark" name="edit" value="Edit">
										</form>
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php

				}
				?>
			</div>
		</div>
		<!--PRODUCTS SHOWCASE-->
		<footer>
			<p style="text-align: center">&copy; 2023 Art Display. All rights reserved.</p>
		</footer>
	</body>

</html>