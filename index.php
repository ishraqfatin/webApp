<?php
include("session.php");
// echo gettype($login_id);
if (isset($_GET['search'])) {
	$searchTerm = $_GET['search'];

	// Build SQL query
	if ($searchTerm != "") {

		$sql = "select * from products as prod JOIN (select userName, userID from users)as users ON prod.userId = users.userId WHERE users.userName LIKE '%$searchTerm%' OR productPrice LIKE '%$searchTerm%' OR prod.productName LIKE '%$searchTerm%' OR prod.productDescription LIKE '%$searchTerm%'";
	} else {
		$sql = "select * from products as prod JOIN (select userName, userID from users)as users ON prod.userId = users.userId ORDER BY prod.createdAt DESC";
	}
	// Execute query
	$result = mysqli_query($con, $sql);

} elseif (isset($_GET['allArts'])) {
	$sql = "select * from products as prod JOIN (select userName, userID from users)as users ON prod.userId = users.userId ORDER BY prod.createdAt DESC";
	$result = mysqli_query($con, $sql);
} else {

	$sql = "select * from products as prod JOIN (select userName, userID from users)as users ON prod.userId = users.userId ORDER BY prod.createdAt DESC LIMIT 5";
	$result = mysqli_query($con, $sql);


}
ini_set('display_errors', 1);


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
		<!--HOMEPAGE-->
		<div class="main">
			<div class="welcome">
				<div class="info">
					<div class="inner">
						<h2>Exploring The <span>ART</span> World</h2>
						<h1>Art Affiliate Marketplace</h1>
						<p> The website is focused on affiliate marketing and will cater to both buyers and sellers. Through the
							platform, sellers can promote their products and services, while buyers can discover and purchase items
							through affiliate links. </p>
						<br /><br />
						<button><a href="./aboutUs_page/aboutUs.php" class="nav-link">About Us</a></button>
					</div>
				</div>
				<img src="./assets/home_img.jpg" class="welcome-img" alt="girlart">
			</div>
			<!--END OF HOMEPAGE-->
			<!--PRODUCTS SHOWCASE-->
			<div id="gallery"></div>
			<div class="gallery">
				<?php if (isset($searchTerm) && $searchTerm != "") { ?>
					<h2 class="row justify-content-center">Results for "
						<?php echo $searchTerm ?>"
					</h2>
				<?php } elseif (isset($_GET['allArts']) && $result) { ?>
					<h2 class="row justify-content-center">All Arts </h2>
				<?php } elseif ($result) { ?>
					<h2 class="row justify-content-center">Featured Arts </h2>
				<?php } ?>
				<div class="row row-cols p-2 justify-content-center">
					<?php
					if ($result) {
						while ($qq = mysqli_fetch_array($result)) { ?>
							<div class="col cardCol ">
								<a href="" class="card-link">
									<div class="card h-100">
										<?php
										echo '<img class="card-img-top img-fluid" alt="Product Image" src="' . $qq['productImage'] . '" />';
										?>
										<div class="card-body">
											<h5 class="card-title">
												<?php echo $qq['productName']; ?>
											</h5>
											<p class="card-subtitle mb-2 text-body-secondary">
											<form action="dashboard.php" method="post">
												<input type="hidden" name="id" value="<?php echo $qq['userId'] ?>"> by<input class="name-link"
													type="submit" name="nameTag" value="<?php echo $qq['userName']; ?>">
											</form>
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
											<a href="#" class="btn btn-info order-btn">Order</a>
										</div>
									</div>
								</a>
							</div>
							<?php

						}
					} else {
						echo '<p class="card-subtitle mb-2 text-body-secondary">No results found</p>';
					}

					?>
				</div>
			</div>
		</div>
		<!--PRODUCTS SHOWCASE-->
		<footer>
			<p style="text-align: center">&copy; 2023 Art Display. All rights reserved.</p>
		</footer>
	</body>

</html>