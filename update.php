<?php
session_start();
$conn = include_once 'connection.php';
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$sameMail = $conn->prepare('select email FROM users WHERE id = ? and email = ?');
	$sameMail->bind_param('is', $_POST['id'],$_POST['email']);
	$sameMail->execute();
    $sameMail->store_result();
    if ($sameMail->num_rows === 0) {
        $checkMail = $conn->prepare('select name FROM users WHERE email = ?');
	    $checkMail->bind_param('s',$_POST['email']);
        $checkMail->execute();
        $checkMail->store_result();
        if ($checkMail->num_rows > 0) {
            $_SESSION['error'] = "This email is already used.";
            $_SESSION['oldname'] = $name;
            $_SESSION['oldsurname'] = $surname;
            header('Location: edit.php?id='.$id);
            exit();
        }
    }
   
    $query = $conn->prepare('update users set name = ? , surname = ? , email = ? where id = ?');
    $query->bind_param('sssi',$name,$surname,$email,$id);
$query->execute();
unset($_SESSION['error'],$_SESSION['oldname'],$_SESSION['oldsurname']);
header("Location: users.php");
