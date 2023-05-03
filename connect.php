<?php
/* Find Mistakes in your code or Database connection */
/* Enable Show Errors From Apache Server */
/* Try Debugging */
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
/* Check Your .htaccess for errors try emptying it for a while */
// 1
// http error 500 - php filePHP By LoneWolf_sage on Mar 17 2022 DonateThankCommentSuggest EditShare
//500 Internal Server Error is shown if your php code has fatal errors but error displaying is switched off. You may try this to see the error itself instead of 500 error page:

//In your php file:
// ini_set('display_errors', 1);
$con = mysqli_connect("localhost", "root", "", "artismdb");
if (!$con) {
	die("cannot connect to server");
}
?>