<?php
$conn = include_once "connection.php";
$result = $conn->query("select id,name,surname,email from users");
$users = $result->fetch_all(MYSQLI_ASSOC);
return $users;
?>