<?php
session_start();

echo('Bonjour ' . $_SESSION['pseudo'] . ' id = ' . $_SESSION['userID']);

?>