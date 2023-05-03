<?php
include 'session.php';

if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
	header("Location: ./login_page/login.php");
	exit;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include 'connect.php';
	// Retrieve the form data
	$name = $_POST["name"];
	$image = $_FILES["image"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$quantity = $_POST["quantity"];
	$userId = $login_id;

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

	// Insert the product into the database
	$sql = "INSERT INTO products (productName, productImage, productDescription, productPrice, productQuantity, userId)
	VALUES ('$name', '$target_file', '$description', '$price', '$quantity', $userId )";
	if ($con->query($sql) === TRUE) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Product Uploaded Successfully!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';

	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}

	// Close the database connection
	$con->close();
}
?>
<html>

	<head>
		<title>Add Product</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<?php include 'userNav.php' ?>
		<div class="container" style="margin-top:20px">
			<h2>Add Product</h2>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">*Product Name:</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div>
				<div class="form-group">
					<label for="image">*Product Image:</label>
					<input type="file" class=" form-control-file" id="image" name="image" accept="image/*" required>
					<small class="form-text text-muted">File size must be less than 20 MB.</small>
				</div>
				<div class="form-group">
					<label for="description">*Product Description:</label>
					<textarea class="form-control" id="description" name="description" rows="5" required></textarea>
				</div>
				<div class="form-group">
					<label for="price">*Product Price:</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">$</span>
						</div>
						<input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" required>
					</div>
				</div>
				<div class="form-group">
					<label for="quantity">*Product Quantity:</label>
					<input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
				</div>
				<button type="submit" class="btn btn-info">Add This Product</button>
			</form>
		</div>
	</body>

</html>