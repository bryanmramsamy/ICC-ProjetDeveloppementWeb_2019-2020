<?php

try {
  $bdd = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');

$nom = $_GET['nom'];
$possesseur = $_GET['possesseur'];
$console = $_GET['console'];
$prix = $_GET['prix'];
$nbre_joueurs_max = $_GET['nbre_joueurs_max'];
$commentaires = $_GET['commentaires'];

$req->execute(array(
  'nom' => $nom,
  'possesseur' => $possesseur,
  'console' => $console,
  'prix' => $prix,
  'nbre_joueurs_max' => $nbre_joueurs_max,
  'commentaires' => $commentaires
  ));

echo 'Le jeu a bien été ajouté !';

// http://localhost:7080/projetWeb/openclassroom_siteWebPhpMySql/c4p4_ecrireDonnees/insertionVariables.php?nom=Halo&possesseur=Michel&console=Xbox&prix=5&nbre_joueurs_max=16&commentaires=Magnifique

?>