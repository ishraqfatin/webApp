<?php
include 'connect.php';
// Retrieve the ID of the user to delete from the URL parameters
$id = $_GET["id"];

// SQL query to delete the user from the database
$query = "DELETE FROM users WHERE userId = $id";
$result = mysqli_query($con, $query);

// Check for errors in the query
if (!$result) {
	die("Query failed: " . mysqli_error($con));
}

// Redirect the user back to the user list page
header("Location: admin.php");
?>