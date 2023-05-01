<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>ARTISM</title>
		<link rel="stylesheet" href="style.css" />
		<link href="https://fonts.googleapis.com/css?family=Fraunces" rel="stylesheet" type="text/css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<!--

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		-->
	</head>

	<body>
		<!--NAVIGATION BAR-->
		<nav class="navbar sticky-top navbar-expand-lg shadow-sm rounded">
			<div class="container-fluid px-5">
				<a class="navbar-brand" href="#">
					<p class="logo"><span id="a1">ART</span>ism.</p>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./services_page/services.html">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Products</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#gallery">Gallery</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false"> More </a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="./login_page/login.php">Login</a></li>
								<li><a class="dropdown-item" href="./registration_page/registration.php">Register</a></li>
								<!-- <li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item" href="#">Something else here</a></li> -->
							</ul>
						</li>
					</ul>
					<form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-warning" type="submit">Search</button>
					</form>
				</div>
			</div>
		</nav>
		<!--END OF NAVIGATION BAR-->
		<!--HOMEPAGE-->
		<div class="welcome">
			<div class="info">
				<div class="inner">
					<h2>Exploring The <span>ART</span> World</h2>
					<h1>Art Affiliate Marketplace</h1>
					<p> The website is focused on affiliate marketing and will cater to both buyers and sellers. Through the
						platform, sellers can promote their products and services, while buyers can discover and purchase items
						through affiliate links. </p>
					<button>Get Started</button>
					<br /><br />
					<button><a href="./aboutUs_page/aboutUs.html" class="nav-link">About Us</a></button>
				</div>
			</div>
			<img src="./assets/home_img.jpg" class="welcome-img" alt="girlart">
		</div>
		<!--END OF HOMEPAGE-->
		<!--PRODUCTS SHOWCASE-->
		<div class="gallery" id="gallery">
			<h2 class="row justify-content-center">Featured Arts</h2>
			<div class="row row-cols-2 row-cols-md-3 g-2 p-5 justify-content-center">
				<div class="col">
					<div class="card h-100">
						<img src="./assets/product3.png" class="card-img-top img-fluid" alt="...">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
								content. This content is a little bit longer.</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card h-100">
						<img src="./assets/product3.png" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">This is a short card.</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card h-100">
						<img src="./assets/product3.png" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
								content.</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card h-100">
						<img src="./assets/product3.png" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
								content. This content is a little bit longer.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--PRODUCTS SHOWCASE-->
	</body>
	<!--FONT AWESOME LINK-->
	<script src="https://kit.fontawesome.com/7f5d1e33e7.js" crossorigin="anonymous"></script>
	<!--FONT AWESOME LINK-->
	<script src="index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>

</html>