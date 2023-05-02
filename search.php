<?php
include("connect.php");

if (isset($_GET['search'])) {
	$searchTerm = $_GET['search'];

	// Build SQL query
	$sql = "SELECT * FROM products WHERE productName LIKE '%$searchTerm%' OR productDescription LIKE '%$searchTerm%'";

	// Execute query
	$result = mysqli_query($con, $sql);

	// Check if any results were found
	if (mysqli_num_rows($result) > 0) {
		// Loop through results and display them
		while ($row = mysqli_fetch_assoc($result)) {
			// Display the image and other information in a div
			echo '<div class="artwork">';
			echo '<img src="data:image/jpeg;base64,' . base64_encode($row['productImage']) . '"/>';
			echo '<h3>' . $row['productName'] . '</h3>';
			echo '<p>' . $row['productDescription'] . '</p>';
			echo '</div>';
		}
	} else {
		echo "No results found.";
	}
}
?>