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
		echo '<script>alert("Passwords do not match.")</script>';
		// echo "Passwords do not match.";
	} else {
		/* Attempt MySQL server connection. Assuming you are running MySQL server with default setting (user 'root' with no password) */
		$link = mysqli_connect("localhost", "root", "", "artismdb");
		// Check connection
		if ($link === false) {
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$verify = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($link, $verify);

		if (mysqli_num_rows($result) > 0) {
			echo '<script>alert("Email is already registered';

		} else {
			$sql = "INSERT INTO users (userName, password, email, contactNumber, age, occupation) VALUES ('$fname', '$password','$email','$phone','$age','$occupation')";
			if (mysqli_query($link, $sql)) {
				echo '<script>alert("Registration Successful")</script>';
				// header("Location: index.html");
				// exit();
			} else {
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
		}
		// Attempt insert query execution

		// Close connection
		mysqli_close($link);
	}
}

?>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Artistm Register</title>
		<link rel="stylesheet" href="styles.css" />
		<link href="https://fonts.googleapis.com/css?family=Fraunces" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<main id="main">
			<div id="card">
				<section id="section-1">
					<a href="../index.php">
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
					</form>
					<p class="disclaimer"> Already a member? <a href="../login_page/login.php">Login</a>
					</p>
				</section>
			</div>
		</main>
	</body>

</html>