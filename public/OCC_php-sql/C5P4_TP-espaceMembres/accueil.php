<?php
session_start();

# Read cookies if they exists
if(isset($_COOKIE['pseudo']) && !empty($_COOKIE['pseudo'])
    && isset($_COOKIE['pass']) && !empty($_COOKIE['pass'])){
    
    $_SESSION['pseudo'] = htmlspecialchars($_COOKIE['pseudo']);
    $_SESSION['pass'] = htmlspecialchars($_COOKIE['pass']);
    
}

if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
    echo('Bonjour ' . $_SESSION['pseudo'] . ' id = ' . $_SESSION['userID']);
    echo('<br/>');
    echo('<a href="deconnexion.php">Cliquez ici pour vous déconnecter</a>');
} else {
    echo('Bonjour invité. Veuillez <a href="inscription.php">vous inscrire</a> ou <a href="connexion.php">vous connecter</a>.');
}


?>