<?php

try {
	$database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
	die('Erreur : ' . $error->getMessage());
}

echo('<h3>Prix moyen</h3><br/>');

$response = $database->query('SELECT AVG(prix) AS prix_avg FROM jeux_video');
$data = $response->fetch();

echo($data['prix_avg']);

$response->closeCursor();



echo('<br/><h3>Somme des prix des jeux de Patrick</h3><br/>');

$possesseur = 'Patrick';

$response = $database->prepare('SELECT SUM(prix) AS prix_sum FROM jeux_video WHERE possesseur=?');
$response->execute(array(
		'Patrick',
	));
$data = $response->fetch();

echo($data['prix_sum']);

$response->closeCursor();



echo('<br/><h3>Valeur maximale parmi les prix</h3><br/>');

$response = $database->query('SELECT MAX(prix) AS prix_max FROM jeux_video');
$data = $response->fetch();

echo($data['prix_max']);

$response->closeCursor();



echo('<br/><h3>Valeur minimale parmi les prix</h3><br/>');

$response = $database->query('SELECT MIN(prix) AS prix_min FROM jeux_video');
$data = $response->fetch();

echo($data['prix_min']);

$response->closeCursor();



echo('<br/><h3>Valeur minimale parmi les prix</h3><br/>');

$response = $database->query('SELECT MIN(prix) AS prix_min FROM jeux_video');
$data = $response->fetch();

echo($data['prix_min']);

$response->closeCursor();



echo('<br/><h3>Nombre d\'entrées</h3><br/>');

$response = $database->query('SELECT COUNT(*) AS nb_games FROM jeux_video');
$data = $response->fetch();

echo($data['nb_games']);

$response->closeCursor();



echo('<br/><h3>Nombre d\'entrées appartenant à Florent</h3><br/>');

$response = $database->prepare('SELECT COUNT(*) AS nb_games FROM jeux_video WHERE possesseur=:owner');
$response->execute(array(
	'owner' => 'Florent',
	));
$data = $response->fetch();

echo($data['nb_games']);

$response->closeCursor();



echo('<br/><h3>Nombre d\'entrées ayant une valeur nbre_joueurs_max non nulle</h3><br/>');

$response = $database->query('SELECT COUNT(nbre_joueurs_max) AS nb_games FROM jeux_video');
$data = $response->fetch();

echo($data['nb_games']);

$response->closeCursor();



echo('<br/><h3>Nombre de possesseurs différents</h3><br/>');

$response = $database->query('SELECT COUNT(DISTINCT possesseur) AS nb_owners FROM jeux_video');
$data = $response->fetch();

echo($data['nb_owners']);

$response->closeCursor();



echo('<br/><h3>Prix moyen selon la console</h3><br/>');

$response = $database->query('SELECT AVG(prix) AS prix_avg, console FROM jeux_video GROUP BY console');

while ($data = $response->fetch()) {
	echo($data['prix_avg'] . ' - ' . $data['console'] . '<br/>');
}

$response->closeCursor();



echo('<br/><h3>Valeur totale des jeux que possède chaque personne</h3><br/>');

$response = $database->query('SELECT SUM(prix) AS prix_sum, possesseur FROM jeux_video GROUP BY possesseur');

while ($data = $response->fetch()) {
	echo($data['prix_sum'] . ' - ' . $data['possesseur'] . '<br/>');
}

$response->closeCursor();



echo('<br/><h3>Prix moyen par console (uniquement les moyennes en dessous ou égales à 10 EUR</h3><br/>');

$response = $database->query('SELECT AVG(prix) AS prix_avg, console FROM jeux_video GROUP BY console HAVING prix_avg <= 10');

while ($data = $response->fetch()) {
	echo($data['prix_avg'] . ' - ' . $data['console'] . '<br/>');
}

$response->closeCursor();



echo('<br/><h3>Prix moyen par console des jeux appartenant à Patrick (uniquement les moyennes en dessous ou égales à 30 EUR</h3><br/>');

$response = $database->prepare('SELECT AVG(prix) AS prix_avg, console, possesseur FROM jeux_video WHERE possesseur=:owner GROUP BY console HAVING prix_avg <= 30');
$response->execute(array(
	'owner' => 'Patrick',
	));
$data = $response->fetch();

while ($data = $response->fetch()) {
	echo($data['prix_avg'] . ' - ' . $data['console'] . '<br/>');
}

$response->closeCursor();
?>