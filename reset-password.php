<?php
include_once 'header.php';
if (!isset($_SESSION['logged'])) {
	header('Location: index.php');
	exit;
}else{
    $conn = include_once "connection.php";
$id = $_GET["id"];
$query = $conn->prepare("select id,email from users where id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
}

?>

    <div class="main-container">
    <?php
if(isset($_SESSION['error'])){
    echo '<div class="msg error smaller">';
    for ($i=0; $i < count($_SESSION['error']); $i++) { 
        echo '<li>'.$_SESSION['error'][$i].'</li>';
    }
    echo '</div>';
   
}

?>    
    
        
        <form autocomplete="off" class="form" action="update-password.php" method="post" onSubmit="return validation(event);">
            <h2>Reset password user #<?php echo $user['id'] ?></h2>
            <input type="hidden" value="<?php echo $user["id"] ?>" name="id">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" value="<?php echo $user['email'] ?>" readonly name="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" autofocus>
                <div id="password-regex"></div>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm password</label>
                <input class="form-control" type="password" id="cpassword" name="cpassword" >
                <div id="password-notmatch" ></div>

            </div>
            
            <input type="submit" class="button" value="Save" >

        </form>
    </div>
    <script src="validate.js"></script>
<?php include_once 'footer.php';?>