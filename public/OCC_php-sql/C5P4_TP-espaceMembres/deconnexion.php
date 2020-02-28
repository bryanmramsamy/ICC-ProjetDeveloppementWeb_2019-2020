<?php
session_start();

$_SESSION = array();  # Delete all $_SESSION variables

session_destroy();

# Delete cookies
setcookie('pseudo', '', time() + (60), null, null, false, true);
setcookie('pass', '', time() + (60), null, null, false, true);

header('Location: accueil.php');

?>