<?php
include_once 'header.php';
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['logged'])) {
	header('Location: index.php');
	exit;
}else{
    $conn = include_once "connection.php";
$id = $_GET["id"];
$query = $conn->prepare("select id,name,surname,email from users where id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
}

?>

    <div class="main-container">
    <?php echo isset($_SESSION["error"]) ? '<div class="msg error smaller">'.$_SESSION['error'].'</div>' : '' ?>   
    
        
        <form autocomplete="off" class="form" action="update.php" method="post" onSubmit="return validation(event);">
            <h2>Edit user #<?php echo $user['id'] ?></h2>
            <input type="hidden" value="<?php echo $user["id"] ?>" name="id">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" value="<?php echo isset($_SESSION["oldname"]) ? $_SESSION['oldname'] : $user['name'] ?>" name="name" placeholder="Type your name" required>
            </div>
            <div class="form-group">
                <label for="name">Surname</label>
                <input class="form-control" type="text" name="surname" value="<?php echo isset($_SESSION["oldsurname"]) ? $_SESSION['oldsurname'] : $user['surname'] ?>" placeholder="Type your surname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" value="<?php echo $user["email"] ?>" name="email" placeholder="Type a valid email" required>
                <div id="email-repeated"></div>
            </div>
            
            <input type="submit" class="button" value="Save" >

        </form>
    </div>


<?php include_once 'footer.php';
?>