<?php
include('connect.php');
session_start();
// $login_session;
// if (!isset($_SESSION['login_user'])) {
// 	$login_session = "Guest";
// } else {

$userName = $_SESSION['login_user'];
// $userId = $_SESSION['login_id'];
$ses_sql = mysqli_query($con, "select userId, userName from users where userName = '$userName'");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

if ($row > 0) {
	$login_session = $row['userName'];
	$login_id = $row['userId'];
}
// }

// if (!isset($_SESSION['login_user'])) {
// 	header("location: ./login_page/login.php");
// 	die();
// } else {
// 	header("location: ./index.php");
// 	die();
// }
?>