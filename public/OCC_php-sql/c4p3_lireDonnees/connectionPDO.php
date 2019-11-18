<?php

/*  Pour activer la fonction PDO, il faut aller dans le module php et actvir l'option dans les fichiers confs.
 *  Dans notre cas, comme nous travaillons avec des containers Dockers, l'image php:fmp a été retirée du docker-compose.yml.
 *  Un Dockerfile a ensuite été crée avec php:fpm et le module extension=php_pdo_mysql a été activé (décommenté dans le fichier /usr/local/etc/php) par la commande RUN docker-php-ext-install pdo pdo_mysql.
 *  Le Dockefile permet donc de contruire une image php:fpm avec l'option extension=php_pdo_mysql acitvée qui sera lancée depuis le docker-compose.yml
 */

try {
  $bdd = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin');
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

// Mettre la base de donnée dans une variable $response
$response = $bdd->query('SELECT * FROM jeux_video');

// Extraire une à une les lignes de $response pour les mettre dans $donnees
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

$response->closeCursor(); // Termine le traîtement de la requête

// Maintenant, on ne veut afficher que le nom des jeux

$response = $bdd->query('SELECT nom FROM jeux_video');
 while ($donnees = $response->fetch()) {
 	echo $donnees['nom'].'<br/>';
}

$response->closeCursor();


echo "<br/><br/>";
// On veut la liste de tous les jeux appartenant à Patrick

$response = $bdd->query('SELECT * FROM jeux_video WHERE possesseur=\'Patrick\'');
while ($donnees = $response->fetch()) {
  echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br/>';
}

$response->closeCursor();

echo "<br/><br/>";
// On veut la liste de tous les jeux appartenant à Michel et qu'il vend pour moins de 20 EUR tiré sur le prix

$response = $bdd->query('SELECT * FROM jeux_video WHERE possesseur=\'Michel\' AND prix < 20 ORDER BY prix');
while ($donnees = $response->fetch()) {
  echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . ", vendu pour " . $donnees['prix'] . ' EUR' . '<br/>';
}

$response->closeCursor();

echo "<br/><br/>";
// Même chose, mais le tri se fait de manière décroissant

$response = $bdd->query('SELECT * FROM jeux_video WHERE possesseur=\'Michel\' AND prix < 20 ORDER BY prix DESC');
while ($donnees = $response->fetch()) {
  echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . ", vendu pour " . $donnees['prix'] . ' EUR' . '<br/>';
}

$response->closeCursor();

echo "<br/><br/>";
// On veut la liste des jeux appartenant à Patrick, en commençant par le 4e et en terminant par le 8e

$response = $bdd->query('SELECT * FROM jeux_video WHERE possesseur=\'Patrick\' LIMIT 3, 4');
while ($donnees = $response->fetch()) {
  echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br/>';
}
$response->closeCursor();

echo "<br/><br/>";
// Test d'une requête SQL en utilisant plusieurs mots clés:
  // Nom, possesseur, console et prix où la console est soit une Xbox, soit une PS2, trié sur le prix déscendant, en affichant que les 10 premiers résultats

$response = $bdd->query('SELECT nom, possesseur, console, prix FROM jeux_video WHERE console=\'Xbox\' OR console=\'PS2\' ORDER BY prix DESC LIMIT 0, 10');
// WARNING: Les mots clés doivent se mettre dans cet ordre là. Un ORDER BY ne pourra pas se mettre devant un WHERE par example !
while ($donnees = $response->fetch()) {
  echo $donnees['nom'] . ' sur ' . $donnees['console'] . ' appartient à ' . $donnees['possesseur'] . ' qui le vend pour ' . $donnees['prix'] . '<br/>';
}
$response->closeCursor();
?>
