<?php

// Récupération des données
try {

    $bdd = new PDO('mysql:host=mysql;dbname=test_mvc;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

} catch (Exception $error) {

    die('Erreur : ' . $error->getMessage());

}

// On récupère les 5 derniers billets
$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

# require('target.php'); works as include, but code execution will stop if target.php is not found. Not with include();
require('affichageAccueil.php');
?>