<html>

	<head>
		<title>Update User Product</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<?php
		include('session.php');
		if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
			header("Location: ./login_page/login.php");
			exit;
		}
		include 'userNav.php';
		if (isset($_POST['edit'])) {
			include('connect.php');
			$id = $_POST['id'];
			$sql = "SELECT * FROM users WHERE userId='$id'";
			$query = mysqli_query($con, $sql);

			if ($query) {
				while ($row = mysqli_fetch_array($query)) { ?>
					<div class="container" style="margin-top:20px">
						<h2>Update Information</h2>
						<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $row['userId'] ?>">
							<div class="form-group">
								<label for="image">Upload a profile image:</label>
								<input type="file" class=" form-control-file" id="image" name="image" accept="image/*" />
								<small class="form-text text-muted">File size must be less than 20 MB.</small>
							</div>
							<div class="form-group">
								<label for="name">User Name:</label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['userName'] ?>" required>
							</div>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>"
									required>
							</div>
							<div class="form-group">
								<label for="confirm_password">Confirm Password:</label>
								<input type="text" class="form-control" id="confirm_password" name="confirm_password"
									value="<?php echo $row['password'] ?>" required>
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" required>
							</div>
							<div class="form-group">
								<label for="phone">Phone:</label>
								<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['contactNumber'] ?>"
									required>
							</div>
							<div class="form-group">
								<label for="occupation">Occupation:</label>
								<input type="text" class="form-control" id="occupation" name="occupation"
									value="<?php echo $row['occupation'] ?>" required>
							</div>
							<div class="form-group">
								<label for="bio">Biography:</label>
								<textarea class="form-control" id="bio" name="bio" rows="5"
									required><?php echo $row['biography'] ?></textarea>
							</div>
							<div class="form-group">
								<label for="social">Social:</label>
								<input type="text" class="form-control" id="social" name="social" value="<?php echo $row['social'] ?>"
									required>
							</div>
							<button type="submit" class="btn btn-primary" name="update">Update</button>
							<a href="./dashboard.php" class="btn btn-danger">Cancel</a>
						</form>
					</div>
				<?php }

			} else {
				echo '<script>alert("No Data Found.")</script>';
			}
		}
		?>
		<?php
		// Check if the form was submitted
		if (isset($_POST["update"])) {
			include 'connect.php';
			// Retrieve the form data
			$id = $_POST['id'];
			$name = $_POST["name"];
			if ($_POST['password'] == $_POST['confirm_password']) {
				$password = $_POST['password'];
			} else {
				echo '<script>alert("Passwords dont match!")</script>';
			}
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$occupation = $_POST['occupation'];
			$bio = $_POST["bio"];
			$social = $_POST['social'];
			$image = $_FILES["image"];


			// Check if the image file is valid and move it to the server
			$target_dir = "./uploads/";
			$target_file = $target_dir . basename($image["name"]);
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$uploadOk = 1;
			// Check if image file is a actual image or fake image
			if (isset($_POST["submit"])) {
				$check = getimagesize($image["tmp_name"]);
				if ($check !== false) {
					$uploadOk = 1;
				} else {
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
									File is not an image.
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>';
					$uploadOk = 0;
				}
			}
			// Check file size
			if ($image["size"] > 20000000) {
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					Sorry, file is too large.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				$uploadOk = 0;
			}
			// Allow certain file formats
			if (
				$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
			) {
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
								Sorry, only JPG, JPEG, PNG & GIF files are allowed.
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>';
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
								Sorry, your file was not uploaded.
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>';
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($image["tmp_name"], $target_file)) {
					echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
									The file ' . basename($image["name"]) . ' has been uploaded.
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>';

				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}



			// Update the product into the database
			$sql = "UPDATE users SET userName='$name', password='$password',userPhoto='$target_file', email='$email', contactNumber='$phone', social='$social', biography='$bio', occupation='$occupation' 
			WHERE userId='$id'";
			if ($con->query($sql) === TRUE) {
				echo "<script>
					alert('User has been updated');
					window.location.href='dashboard.php';
					</script>";


			} else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}


			// Close the database connection
			$con->close();
		}
		?>
	</body>

</html>