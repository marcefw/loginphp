<?php
include_once 'header.php';
if (!isset($_SESSION['logged'])) {
	header('Location: index.php');
	exit;
}else{
		$users = include_once 'select.php';
	}
?>

<div class="users-container">
<a class="btn btn-success" href="create.php"><span class="fa fa-plus"></span> Add new user</a>
<table id="users">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user["id"] ?></td>
                        <td><?php echo $user["name"] ?></td>
                        <td><?php echo $user["surname"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td>
                            <a title="Edit User" class="btn btn-edit" href="edit.php?id=<?php echo $user["id"] ?>"><span class="fa fa-edit"></span></a>
                            <a title="Reset Password" class="btn btn-warning" href="reset-password.php?id=<?php echo $user["id"] ?>"><span class="fa fa-key"></span></a>
                        
                            <a title="Delete User" class="btn btn-delete" href="confirm-delete.php?id=<?php echo $user["id"] ?>"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
</table>
</div>
<?php include_once 'footer.php'; ?>