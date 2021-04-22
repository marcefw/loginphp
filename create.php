<?php
include_once 'header.php';
if (!isset($_SESSION['logged'])) {
	header('Location: index.php');
	exit;
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
      
   
        <form autocomplete="off" class="form" action="insert.php" method="post" onSubmit="return validation(event);">
            <h2>Create new user</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" value="<?php echo isset($_SESSION["oldname"]) ? $_SESSION['oldname'] : '' ?>" name="name" placeholder="Type your name" required>
            </div>
            <div class="form-group">
                <label for="name">Surname</label>
                <input class="form-control" type="text" value="<?php echo isset($_SESSION["oldsurname"]) ? $_SESSION['oldsurname'] : '' ?>" name="surname" placeholder="Type your surname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" value="<?php echo isset($_SESSION["oldemail"]) ? $_SESSION['oldemail'] : '' ?>" name="email" placeholder="Type a valid email" required>
                
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" title="Must contain a minimum of 8 characters, at least 1 uppercase letter, 1 lowercase letter, and 1 number with no spaces." required >
                <div id="password-regex"></div>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm password</label>
                <input class="form-control" type="password" id="cpassword" name="cpassword"  title="Must be the same value then Password field." required >
                <div id="password-notmatch" ></div>

            </div>
            <input type="submit" class="button" value="Add" >
        </form>
    </div>
    <script src="validate.js"></script>
<?php include_once 'footer.php';
?>