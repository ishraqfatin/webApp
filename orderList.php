<?php
include 'session.php';
if (!isset($_SESSION['login_user']) || empty($_SESSION['login_user'])) {
	header("Location: ./login_page/login.php");
	exit;
}
?>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Orders List</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>

	<body>
		<?php
		if (isset($login_session) && $login_session != "") {
			include 'userNav.php';
		} else {
			include 'navBar.php';
		}
		?>
		<div class="container mt-4">
			<h1>List of Orders for your products</h1>
			<table
				class="table rounded rounded-3 overflow-hidden table-striped table-hover align-middle table-bordered text-center">
				<thead class="table-light">
					<tr>
						<th scope="col">Order ID</th>
						<th scope="col">Customer Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						<th scope="col">Product Name</th>
						<th scope="col">Product Quantity</th>
						<th scope="col">Address</th>
						<th scope="col">Order Date</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<!-- PHP code to retrieve list of users from the database and display them in the table -->
					<?php
					// if (isset($_POST['orders'])) {
					
					// conect to the database
					include 'connect.php';

					// Retrieve list of users from the database
					$sql = "SELECT orders.*, products.productName, users.userName, users.email, users.contactNumber
					FROM orders
					JOIN products ON orders.productId = products.productId
					JOIN users ON orders.userId = users.userId
					WHERE products.userId = '$login_id'";
					$result = mysqli_query($con, $sql);

					// Display list of users in the table
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $row["orderId"] . "</td>";
							echo "<td>" . $row["userName"] . "</td>";
							echo "<td>" . $row["email"] . "</td>";
							echo "<td>" . $row["contactNumber"] . "</td>";
							echo "<td>" . $row["productName"] . "</td>";
							echo "<td>" . $row["orderQuantity"] . "</td>";
							echo "<td>" . $row["orderLocation"] . "</td>";
							echo "<td>" . $row["orderDate"] . "</td>";
							echo "<td><a href='deleteOrder.php?id=" . $row["orderId"] . "' class='btn btn-success'>Resolve</a></td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='4'>No users found.</td></tr>";
						// }
					
						// Close database conection
						mysqli_close($con);
					}
					?>
				</tbody>
			</table>
			<form action=""></form>
			<a class="btn btn-warning custom-btn " href="./dashboard.php">Go back</a>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>

</html>