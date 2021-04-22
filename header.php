<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP Login Test by Marcelo Weremczuk</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
	<div class="nav-top">
			<div class="options">
				<a href="users.php"><span class="fas fa-home" style="margin-right: 2px"></span>Home</a>
				<a href="logout.php"><span class="fas fa-sign-out-alt" style="margin-right: 2px"></span>Logout</a>
			</div>
			<div class="welcome">
				Welcome <b><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>!</b>
			</div>
		</div>
		