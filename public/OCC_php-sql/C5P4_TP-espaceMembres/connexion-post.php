<?php
session_start();

# Use $_SESSION variables as input if they exist
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])
    && isset($_SESSION['pass']) && !empty($_SESSION['pass'])){

    $_POST['pseudo'] = $_SESSION['pseudo'];
    $_POST['password'] = $_SESSION['pass'];

}


# Database access
try {
    $database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
    die('Erreur : ' . $error->getMessage());
}


# Check if pseudo and password has been entered
if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])
    && isset($_POST['password']) && !empty($_POST['password'])) {
    
    $input_pseudo = htmlspecialchars($_POST['pseudo']);
    $input_pass = htmlspecialchars($_POST['password']);

    # Check if member's pseudo exist
    $request = $database->prepare('SELECT pseudo, pass FROM membres WHERE pseudo = ?');
    $request->execute(array(($input_pseudo)));
    $result = $request->fetch();

    if (isset($result) && !empty($result)) {

        $pseudo_exist = true;
        $password_match = password_verify($input_pass, $result['pass']);

    } else {
        
        $pseudo_exist = false;
        $password_match = false;

    }

    $request->closeCursor();
}

if ($pseudo_exist && $password_match) {

    $_SESSION['pseudo'] = $input_pseudo;
    $_SESSION['pass'] = $input_pass;

    if (isset($_POST['auto_sign_in'])){
        header('Location: connexion-cookies.php');
    } else {
        header('Location: accueil.php');
    }

} else {

    header('Location: connexion.php?unknown_member=1');

}

?>