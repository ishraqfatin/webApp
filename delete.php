<?php
include('connect.php');
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include('connect.php');

	$productId = $_POST['id'];
	$sql = "delete from products where productId = $productId";
	if ($con->query($sql) === TRUE) {
		echo "<script>
		window.location.href='myGallery.php';
		alert('Product has been deleted');
		</script>";
	} else {
		echo "Error";
	}

	// Close the database connection
	$con->close();
}
?>