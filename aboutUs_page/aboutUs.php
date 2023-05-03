<?php
include("session.php");

?>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>ARTISM</title>
		<link rel="stylesheet" href="styleAu.css" />
		<link href="https://fonts.googleapis.com/css?family=Fraunces" rel="stylesheet" type="text/css" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
		<!--

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		-->
	</head>

	<body>
		<!--NAVIGATION BAR-->
		<?php
		// if (isset($login_session) && $login_session != "") {
		// 	include '../userNav.php';
		// } else {
		// 	include '../navBar.php';
		// }
		?>
		<div class="welcome">
			<div class="info">
				<p>ABOUT US</p>
				<h1>Helping Artists Sell their Masterpieces Extraordinarily</h1>
				<p style="padding-top: 8%; padding-bottom: 5%"> Artism is a platform that gives artists to showcase their arts.
					It also gives them the freedom to sell their arts and crafts individually. And collaborate with other artis.
					It's secure and safe. </p>
				<a href="../index.php">
					<button class="cta">
						<span>Go Home</span>
						<svg viewBox="0 0 13 10" height="10px" width="15px">
							<path d="M1,5 L11,5"></path>
							<polyline points="8 1 12 5 8 9"></polyline>
						</svg>
					</button>
				</a>
			</div>
			<img class="aboutImg" src="../assets/aroni.jpg" alt="" /><br /><br />
		</div>
	</body>
	<!--ABOUT US SECTION-->
	<!--
<div class="container">
		<div class="text d-flex align-center">
				<div class="inner">
						<img src="eshrak.jpg" alt="">
						<h2>HASIN ESHRAK</h2>
						<br>
						<p>As a computer science & engineering major with a minor in management information system, I possess a
								diverse skill set that includes coding, web development, data analytics, and database management.
								Additionally, my software skills are my expertise, and I have won multiple awards in book reading and
								debate competitions.
								<br><br>
								My career objective is to work as a technical head, team leader, or project leader in a tech company. I
								am eager to apply my knowledge and skills to solve complex problems and contribute to the growth and
								success of the organization. Ultimately, my long-term goal is to launch my own startup and make a
								positive impact in the tech industry.
								<br><br>
								If given the opportunity, I am confident that I will excel in any role that requires strong technical
								and leadership skills.
						</p><br>

				</div>

		</div>

		<div class="img d-flex align-center">
				<img src="eshrak.jpg" alt="">
		</div>
</div>

-->
	<!--
	<div class="wrapper">
		<img src="../assets/eshrak.jpg" alt="" />
		<div class="text-box">
			<h2>HASIN ESHRAK</h2>
			<br />
			<p>
				As a computer science & engineering major with a minor in management
				information system, I possess a diverse skill set that includes coding,
				web development, data analytics, and database management. Additionally,
				my software skills are my expertise, and I have won multiple awards in
				book reading and debate competitions. <br /><br />
				My career objective is to work as a technical head, team leader, or
				project leader in a tech company. I am eager to apply my knowledge and
				skills to solve complex problems and contribute to the growth and
				success of the organization. Ultimately, my long-term goal is to launch
				my own startup and make a positive impact in the tech industry.
				<br /><br />
				If given the opportunity, I am confident that I will excel in any role
				that requires strong technical and leadership skills.
			</p>
			<br />
		</div>
	</div>

	<div class="wrapperFI">
		<img src="../assets/fatin.jpg" alt="" />
		<div class="text-boxFI">
			<h2>FATIN ISHRAQ AHAMMED</h2>
			<br />
			<p>
				I am currently pursuing my bachelors degree in Computer Science and
				Engineering at Independent University, Bangladesh. <br /><br />
				Simulteneously, I am working as a part time Web Developer at Bioforge
				Health Systems Ltd.
				<br /><br />
				I love to go on adventures and occasionally play a little bit of guitar.
				As a tech enthusiast and a maker, I have also dabbled into prototyping
				and designing via CAD softwares and 3D printers.
			</p>
			<br />
		</div>
	</div>

	<div class="wrapperA">
		<img src="../assets/aroni.jpg" alt="" /><br /><br />
		<div class="text-boxA">
			<h2>MST ARONI BEGUM</h2>
			<br />
			<p>
				I am currently pursuing my bachelors degree in Computer Science and
				Engineering at Independent University, Bangladesh. <br /><br />
				Simulteneously, I am working as a part time Web Developer at Bioforge
				Health Systems Ltd.
				<br /><br />
				I love to go on adventures and occasionally play a little bit of guitar.
				As a tech enthusiast and a maker, I have also dabbled into prototyping
				and designing via CAD softwares and 3D printers.
			</p>
			<br />
		</div>
	</div>
-->
	<!--END OF ABOUT US SECTION-->
	<script src="https://kit.fontawesome.com/7f5d1e33e7.js" crossorigin="anonymous"></script>
	<!--FONT AWESOME LINK-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>

</html>