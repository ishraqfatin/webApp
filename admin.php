<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Panel - Users</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	</head>

	<body>
		<div class="container mt-4">
			<h1>Admin Panel - Users</h1>
			<table class="table table-primary">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone</th>
						<th scope="col">DoB</th>
						<th scope="col">Occupation</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<!-- PHP code to retrieve list of users from the database and display them in the table -->
					<?php
					// conect to the database
					include 'connect.php';

					// Retrieve list of users from the database
					$sql = "SELECT * FROM users WHERE
					userName!= 'admin'";
					$result = mysqli_query($con, $sql);

					// Display list of users in the table
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $row["userId"] . "</td>";
							echo "<td>" . $row["userName"] . "</td>";
							echo "<td>" . $row["email"] . "</td>";
							echo "<td>" . $row["contactNumber"] . "</td>";
							echo "<td>" . $row["dateOfBirth"] . "</td>";
							echo "<td>" . $row["occupation"] . "</td>";
							echo "<td><a href='deleteUser.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='4'>No users found.</td></tr>";
					}

					// Close database conection
					mysqli_close($con);
					?>
				</tbody>
			</table>
			<form action=""></form>
			<a class="btn btn-warning custom-btn " href="./logout.php">Logout</a>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>

</html>