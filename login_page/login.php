<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Artism Login</title>
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
					<form id="login-form" action="submit" method="post">
						<h1 id="header">Login</h1>
						<input type="text" name="name" id="name" placeholder="Username" autocomplete="off" required />
						<input type="text" name="pass" id="pass" placeholder="Password" required />
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

</html>