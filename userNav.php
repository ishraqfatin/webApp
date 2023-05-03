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
		<nav class="navbar sticky-top navbar-expand-lg shadow-sm rounded">
			<div class="container-fluid px-5">
				<a class="navbar-brand" href="./index.php">
					<p class="logo"><span id="a1">ART</span>ism.</p>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-between " id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="./index.php#gallery">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./services_page/services.html">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./addProduct.php">Upload</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./myGallery.php">My Gallery</a>
						</li>
						<li class="nav-item">
							<form method="get" action="./index.php#gallery">
								<button class="nav-link" type="submit" name="allArts">All Arts</button>
							</form>
						</li>
					</ul>
					<form class="d-flex" role="search" action="" method="get">
						<input class="form-control me-2" type="text" id="search" name="search">
						<button class="btn btn-outline-warning" type="submit">Search</button>
					</form>
					<a class="btn btn-warning custom-btn " style="margin-left:30px" href="./logout.php">Logout</a>
					<a class="btn btn-outline-success" style="margin-bottom:8px; margin-left:10px" href="./dashboard.php">Welcome,
						<span>
							<?php echo $login_session;
							?>
						</span>
					</a>
				</div>
			</div>
		</nav>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>

</html>