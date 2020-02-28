<?php
session_start();

setcookie('pseudo', $_SESSION['pseudo'], time() + (30 * 24 * 60 * 60), null, null, false, true);
setcookie('pass', $_SESSION['pass'], time() + (30 * 24 * 60 * 60), null, null, false, true);

header('Location: accueil.php');
?>