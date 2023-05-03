<?php
include('session.php');

// Check if user is logged in, otherwise redirect to login page
// if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
// 	header("Location: ./login_page/login.php");
// 	exit;
// }

// Include database connection file
require_once "connect.php";

global $id;

if (isset($_POST['nameTag'])) {
	$id = $_POST['id'];
} else {
	$id = $login_id;
}
// Prepare a select statement to get user information
// global $mysqli;
$sql = "SELECT * FROM users WHERE userId = ?";
if ($stmt = $con->prepare($sql)) {
	$stmt->bind_param("i", $param_id);
	$param_id = $id;
	if ($stmt->execute()) {
		$result = $stmt->get_result();
		if ($result->num_rows == 1) {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$name = $row["userName"];
			$email = $row["email"];
			$occupation = $row["occupation"];
			$bio = $row["biography"];
			$photo = $row["userPhoto"];
			$contact_number = $row["contactNumber"];
			$social_links = $row["social"];
		} else {
			echo "Error retrieving user information.";
		}
	} else {
		echo "Error executing statement.";
	}
	$stmt->close();
	$con->close();
} else {
	echo "Error preparing statement.";
}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>User Profile Page</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	</head>

	<body>
		<?php
		if (isset($login_session) && $login_session != "") {
			include 'userNav.php';
		} else {
			include 'navBar.php';
		}
		?>
		<div class="container mt-5">
			<div class="row">
				<div class="col">
					<div class="card h-100">
						<div class="card-body text-center">
							<?php
							echo '<img class="rounded-circle mb-3" style="object-fit:cover; object-position:center;" alt="User Photo" src="' . $photo . '" width="160" height="160"/>';
							?>
							<h4 class="mb-0">
								<?php echo $name ?>
							</h4>
							<p class="text-muted">
								<?php echo $occupation ?>
							</p>
							<div class="social-links">
								<?php echo $social_links ? '<a target="_blank" href="' . $social_links . '" class="twitter"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-diagram-2" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 5 7h2.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM3 11.5A1.5 1.5 0 0 1 4.5 10h1A1.5 1.5 0 0 1 7 11.5v1A1.5 1.5 0 0 1 5.5 14h-1A1.5 1.5 0 0 1 3 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 1 9 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
</svg></a>' : "<p>No Social</p>" ?>
								<!-- <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
								<a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
								<a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a> -->
							</div>
							<?php if ($login_id == $param_id) { ?>
								<form action="updateUser.php" method="post" class="mt-5">
									<input type="hidden" name="id" value="<?php echo $param_id ?>">
									<input type="submit" class="btn btn-dark" name="edit" value="Edit">
								</form>
							<?php }
							?>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card">
						<div class="card-body">
							<h4 class="mb-3">Bio</h4>
							<?php echo $bio ? '<p>' . $bio . '</p>' : "<p>No bio...</p>" ?>
						</div>
					</div>
					<div class="card mt-4">
						<div class="card-body">
							<h4 class="mb-3">Contact Information</h4>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<?php echo $email ?>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-4">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-8 text-secondary">
									<?php echo $contact_number ?>
								</div>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min"></script>

</html>