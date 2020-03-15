<?php

try {
  $bdd = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT * FROM jeuxvideo') or die(print_r($bdd->errorInfo()));
// sert pas à grand chose étant donné que les erreurs sont affichées par défaut dans cette version de php et mySql
$req->execute(array(
  
));

while ($data = $req->fetch()) {
  echo $data['nom'] . ' appartient à ' . $data['possesseur'] . '<br/>';
}

$req->closeCursor();

?>