<?php

try {
  $bdd = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('DELETE FROM jeux_video WHERE nom = :nom');

if(isset($_GET['nom'])){
  $req->execute(array(
  	'nom' => $_GET['nom']
  ));
  echo $_GET['nom'] . ' a bien été supprimé !';

} else {
  echo $_GET['nom'] . ' n\'a pas été trouvé. Suppression annulée.';
}

// http://localhost:7080/projetWeb/openclassroom_siteWebPhpMySql/c4p4_ecrireDonnees/suppression.php?nom=Battlefield%201942

?>