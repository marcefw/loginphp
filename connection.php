<?php
$DB_HOST= 'loginphp.c7sdisgmtykr.us-east-2.rds.amazonaws.com';
$DB_USERNAME = 'admin';
$DB_PASSWORD = 'password';
$DB_NAME = 'pruebaphp';
$conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
if ( mysqli_connect_errno() ) {
	exit('Connection refused: ' . mysqli_connect_error());
}
return $conn;
?>
