<?php

try {
  $bdd = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('UPDATE jeux_video SET prix = ?, nbre_joueurs_max = ? WHERE ID = ?');
if(isset($_GET['id'])){
  $req->execute(array($_GET['prix'], $_GET['nbre_joueurs_max'], $_GET['id']));

  echo 'Le jeu a bien été modifié !';

  // http://localhost:7080/projetWeb/openclassroom_siteWebPhpMySql/c4p4_ecrireDonnees/modification.php?id=51&prix=10&nbre_joueurs_max=32
} else {
	echo 'Aucun ID entré';
}

$req = $bdd->prepare('UPDATE jeux_video SET possesseur = ? WHERE possesseur = ?');
if(isset($_GET['chocolate'])){
  $req->execute(array('Florent', 'Michel'));
} else {
  echo 'Les jeux de Michel ne sont pas passé chez Florent !';
}

$req = $bdd->prepare('UPDATE jeux_video SET prix = :prix, nbre_joueurs_max = :nbre_joueurs_max WHERE nom = :nom');
if(isset($_GET['vanilla'])){
  $nb_modifs = $req->execute(array('prix' => 15, 'nom' => 'Battlefield 1942', 'nbre_joueurs_max' => 30));
  echo 'Vanilla change has been made. Number of changes = ' . $nb_modifs;
} else {
	echo 'Vanilla change failed and aborted...';
}

?>