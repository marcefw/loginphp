<?php
session_start();
if (isset($_SESSION['logged'])) {
	header('Location: users.php');
	exit;}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="main-container">
    <div class="login">
    <?php
if(isset($_SESSION['error'])){
    echo '<div class="msg error smaller centered">';
 
        echo $_SESSION['error'];
    
    echo '</div>';
   
}

?>  
        <form class="form" action="authenticate.php" method="post">
            <h2>Welcome</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Type your email address" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <input type="submit" class="button" value="Login">
        </form>
    </div>
    </div>
<div class="footer"><p>Este proyecto fue desarrollado por <b>Marcelo Weremczuk</b> en concepto de una prueba evaluativa.</p><p><b>Email:</b> marceweremczuk@gmail.com</p></div>
</body>

</html>
<?php unset($_SESSION['error']); ?>