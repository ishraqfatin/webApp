<?php
include 'connect.php';
// Retrieve the ID of the user to delete from the URL parameters
$id = $_GET["id"];

// SQL query to delete the user from the database
$query = "DELETE FROM orders WHERE orderId = $id";
$result = mysqli_query($con, $query);

// Check for errors in the query
if (!$result) {
	die("Query failed: " . mysqli_error($con));
}

// Redirect the user back to the user list page
// header("Location: admin.php");
echo '<script>
		window.location.href="orderList.php";
		alert("Order has been resolved");
		</script>'

	?>