<?php
include("../connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 

	$myusername = mysqli_real_escape_string($con, $_POST['username']);
	$mypassword = mysqli_real_escape_string($con, $_POST['password']);

	$sql = "SELECT userName FROM users WHERE userName = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$active = $row['active'];

	$count = mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row

	if ($count == 1) {
		// session_register("myusername");
		$_SESSION['login_user'] = $myusername;
		$_SESSION["login_id"] = trim($row["userId"]);
		if ($_SESSION['login_user'] == "admin") {
			header("location: ../admin.php");
		} else {
			header("location: ../index.php");

		}
	} else {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Password or Username does not match
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
	}
}
?>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Artism Login</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link rel="stylesheet" href="styles.css" />
		<link href="https://fonts.googleapis.com/css?family=Fraunces" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<main id="main">
			<div id="card">
				<a href="../index.php">
					<section id="section-1">
						<p class="logo"><span id="a1">ART</span>ism.</p>
					</section>
				</a>
				<section id="section-2">
					<form id="login-form" action="" method="POST">
						<h1 id="header">Login</h1>
						<input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required />
						<input type="text" name="password" id="password" placeholder="Password" required />
						<button class="cta" type="submit">
							<span>Login</span>
							<svg viewBox="0 0 13 10" height="10px" width="15px">
								<path d="M1,5 L11,5"></path>
								<polyline points="8 1 12 5 8 9"></polyline>
							</svg>
						</button>
						<p class="disclaimer"> Not a member? <a href="../registration_page/registration.php">Register as a
								creator</a>
						</p>
					</form>
				</section>
			</div>
		</main>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>

</html>