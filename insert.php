<?php
session_start();
$conn = include_once 'connection.php';
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$email = $_POST['email'];
$errors = array();
$pattern = "/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{7,})\S$/";

    if(empty($name)){
        array_push($errors,"Name field cannot be empty.");
    }else{
        $_SESSION['oldname'] = $name;
    }
    if(empty($surname)){
        array_push($errors,"Surname field cannot be empty.");
    }else{
        $_SESSION['oldsurname'] = $surname;
    }
    if(empty($email)){
        array_push($errors,"Email field cannot be empty.");
    }else{
        $select = $conn->prepare('SELECT name, password FROM users WHERE email = ?');
	    $select->bind_param('s', $_POST['email']);
	    $select->execute();
        $select->store_result();
        if ($select->num_rows > 0) {
            array_push($errors,"This email is already used.");
        }
        $_SESSION['oldemail'] = $email;
    }
    if($password!=$cpassword){
        array_push($errors,"Password confirmation does not match.");
    }
    if(preg_match($pattern,$_POST['password'])==0){
        array_push($errors,"Password must contain a minimum of 8 characters, at least 1 uppercase letter, 1 lowercase letter, and 1 number with no spaces.");
    }else{
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }
   

    
    if(count($errors)>0){
        $_SESSION['error'] = $errors;
        header('Location: create.php');
        exit();
    }

$query = $conn->prepare('insert into users (name, surname, email, password) values (?,?,?,?) ');
$query->bind_param('ssss',$name,$surname,$email,$password);
$query->execute();
unset($_SESSION['error'],$_SESSION['oldname'],$_SESSION['oldsurname'],$_SESSION['oldemail']);
header("Location: users.php");
