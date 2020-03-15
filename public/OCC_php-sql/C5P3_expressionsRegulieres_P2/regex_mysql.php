<?php

try {
  $bdd = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

$response = $bdd->query('SELECT * FROM jeux_video WHERE console REGEXP \'^[A-Z]{2}[1-3]?$\'');

while($donnees = $response->fetch()){
  ?>
  <p>
    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?>
    <br/>
    Le possesseur de ce jeu est: <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> EUR !
    <br/>
    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueur_max']; ?> au maximum.
    <br/>
    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
  </p>
  <?php
}

$response->closeCursor();

?>
