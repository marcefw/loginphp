<?php
include_once 'header.php';
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

   
    <div class="card">
   
         <h2>¿Are you sure you want to delete <i><?php echo '<br>'.$user['surname'].", ".$user['name'] ?></i>?</h2>
    <a class="btn btn-success" href="delete.php?id=<?php echo $user["id"] ?>"><span class="fa fa-check-circle"></span> YES</a>
    <a class="btn btn-delete" href="users.php"><span class="fa fa-times-circle"></span> NO</a>
    
    </div>
   
<?php include_once 'footer.php'; ?>