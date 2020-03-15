<?php

try {
  $bdd = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

echo '<h1>Variables directement dans la requête: DANGER: RISQUE ÉNORME D\'INJECTION SQL !</h1>';

/*  CRITICAL WARNING: Grosse faille de sécurité: injection SQL !
 *  L'utilisateur peut modifier les données passées dans l'URL et manipuler la base de données SQL comme il le veut
 *  CETTE MÉTHODE EST À PROSCRIRE À TOUS PRIX !!!
 *    Elle est montrée ici dans un cadre éducationnel
 */ 
$response = $bdd->query('SELECT * FROM jeux_video WHERE possesseur=\''. $_GET['possesseur'] .'\'');

while ($donnees = $response->fetch()) {
  echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br/>';
}

$response->closeCursor();

echo '<br/><br/>';
echo '<h1>Mon example: Sans marqueurs nominatifs</h1>';
// Solution: Requêtes préparées: plus sûr et plus rapide !
// Utilisation de prepare() au lieu de query()

// Préparation de la requête sans sa partie variable
$requete = $bdd->prepare('SELECT * FROM jeux_video WHERE possesseur = ?');

// Éxecution de la requête préparée avec des paramètres sous forme d'array
$requete->execute(array($_GET['possesseur']));

while ($donnees = $requete->fetch()) {
  echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br/>';
}

$response->closeCursor();

echo '<br/><br/>';
echo '<h1>Mon example: Avec marqueurs nominatifs</h1>';
// Solution: Requêtes préparées: plus sûr et plus rapide !
// Utilisation de prepare() au lieu de query()

// Préparation de la requête sans sa partie variable
$requete = $bdd->prepare('SELECT * FROM jeux_video WHERE possesseur = :possesseur');

// Éxecution de la requête préparée avec des paramètres sous forme d'array
$requete->execute(array('possesseur' => $_GET['possesseur']));

while ($donnees = $requete->fetch()) {
  echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br/>';
}

$response->closeCursor();

echo '<br/><br/>';
echo '<h1>Example OCC: Sans marquers nominatifs</h1>';

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ?  AND prix <= ? ORDER BY prix');
$req->execute(array($_GET['possesseur'], $_GET['prix_max']));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}
echo '</ul>';

$req->closeCursor();

echo '<br/><br/>';
echo '<h1>Example OCC: Avec marquers nominatifs</h1>';

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax');
$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));

echo '<ul>';
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}
echo '</ul>';

$req->closeCursor();

?>