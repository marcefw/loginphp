<?php
session_start();
if (!isset($_SESSION['logged'])) {
	header('Location: index.php');
	exit;}
if (!isset($_GET["id"])) {
    exit("User not found.");
}
$conn = include_once "connection.php";
$id = $_GET["id"];
$query = $conn->prepare("delete FROM users WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
header("Location: users.php");