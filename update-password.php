<?php
session_start();
$conn = include_once 'connection.php';
$id = $_POST['id'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$pattern = "/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{8,})\S$/";
$errors = array();
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
    header('Location: reset-password.php?id='.$id);
    exit();
  }
$query = $conn->prepare('update users set password = ? where id = ?');
$query->bind_param('si',$password,$id);
$query->execute();
unset($_SESSION['error']);
header("Location: users.php");
