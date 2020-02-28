<?php

session_start();

# Database access
try {
    $database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
    die('Erreur : ' . $error->getMessage());
}

$request = $database->prepare('INSERT INTO membres (pseudo, pass, email, date_inscription, id_groupe) VALUES (?, ?, ?, NOW(), 1)');

$request->execute(array(
    $_SESSION['pseudo'],
    $_SESSION['pass'],
    $_SESSION['email']
));

$request->closeCursor();

unset($_SESSION['pass']);
unset($_SESSION['email']);

$request = $database->prepare('SELECT id FROM membres WHERE pseudo = ?');

$request->execute(array(
    $_SESSION['pseudo']
));

$user = $request->fetch();

if (isset($user['id']) && !empty($user['id'])) {
    $_SESSION['userID'] = $user['id'];
} else {
    echo('An error occured: user id for '. $_SESSION['pseudo'].' unknown');
}

header('Location: accueil.php');

?>