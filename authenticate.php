<?php
session_start();
$conn = include_once 'connection.php';
if ( !isset($_POST['email'], $_POST['password']) ) {
	header('Location: users.php');
    exit();
}
$query = $conn->prepare('SELECT name, password FROM users WHERE email = ?');
	$query->bind_param('s', $_POST['email']);
	$query->execute();
    $query->store_result();
    if ($query->num_rows > 0) {
        $query->bind_result($name, $password);
        $query->fetch();
       if (password_verify($_POST['password'], $password)) {
          session_regenerate_id();
            $_SESSION['logged'] = TRUE;
            $_SESSION['name'] = $name;
            header('Location: users.php');
        } else {
            $_SESSION['error'] = 'Incorrect email or password. Please verify.';
            header('Location: index.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'Incorrect email or password. Please verify.';
            header('Location: index.php');
            exit();
    }
	$query->close();

?>