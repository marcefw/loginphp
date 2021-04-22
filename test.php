<?php
session_start();
for ($i=0; $i < count($_SESSION['error']); $i++) { 
    echo '<li>'.$_SESSION['error'][$i].'</li>';
}
?>

