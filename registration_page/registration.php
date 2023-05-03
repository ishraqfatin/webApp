<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


	$fname = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirm_password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$occupation = $_POST['occupation'];
	// echo $email; 
// echo $phone;
// echo $message;

	// Form validation
	if ($password != $confirmPassword) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Passwords do not match!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
		// echo "Passwords do not match.";
	} else {
		include("../connect.php");
		$verify = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($con, $verify);

		if (mysqli_num_rows($result) > 0) {
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Email already exists!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>';

		} else {
			$sql = "INSERT INTO users (userName, password, email, contactNumber, dateOfBirth, occupation) VALUES ('$fname', '$password','$email','$phone','$age','$occupation')";
			if (mysqli_query($con, $sql)) {
				// header("Location: ../index.php");
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Registration Successful!
  			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>';
				// exit();
			} else {
				echo "<script>alert('ERROR: Could not able to execute')</script> $sql. " . mysqli_error($con);
			}
		}
		// Attempt insert query execution

		// Close connection
		// mysqli_close($con);
	}
}

?>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Artistm Register</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link rel="stylesheet" href="styles.css" />
		<link href="https://fonts.googleapis.com/css?family=Fraunces" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<main id="main">
			<div id="card">
				<section id="section-1">
					<a href="../index.php" class="link-underline-opacity-0">
						<p class="logo"><span id="a1">ART</span>ism.</p>
					</a>
				</section>
				<section id="section-2">
					<form id="login-form" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
						<h1 id="header">Registration</h1>
						<input type="text" name="username" id="username" placeholder="Username*" required />
						<input type="text" name="password" id="password" placeholder="Password*" required />
						<input type="text" name="confirm_password" id="confirm_password" placeholder="Confirm Password*" required />
						<input type="email" name="email" id="email" placeholder="Email*" required />
						<input type="text" name="phone" id="phone" placeholder="Contact Number" />
						<section id="name">
							<input type="date" name="age" id="age" placeholder="Age*" required />
							<input type="text" name="occupation" id="occupation" placeholder="Occupation*" required />
						</section>
						<button class="cta" type="submit" name="SubmitButton">
							<span>Register</span>
							<svg viewBox="0 0 13 10" height="10px" width="15px">
								<path d="M1,5 L11,5"></path>
								<polyline points="8 1 12 5 8 9"></polyline>
							</svg>
						</button>
						<p class="disclaimer"> Already a member? <a href="../login_page/login.php">Login</a>
						</p>
					</form>
				</section>
			</div>
		</main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
			crossorigin="anonymous"></script>
	</body>

</html>