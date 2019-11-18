<?php

try {
	$database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
	die('Erreur : ' . $error->getMessage());
}

echo('<br/><h3>Majuscules</h3><br/>');

// Alias needed when scalaire function used
$response = $database->query('SELECT UPPER(nom) AS nom_upp FROM jeux_video');

while($game = $response->fetch()){
	echo($game['nom_upp'] . '<br/>');
}

$response->closeCursor();

echo('<br/><h3>Majuscules + autres champs</h3><br/>');

$response = $database->query('SELECT UPPER(nom) AS nom_upp, possesseur, console, prix FROM jeux_video');

while($game = $response->fetch()){
	echo($game['nom_upp'] . ' appartenant à ' . $game['possesseur'] . ' sur ' . $game['console'] . ' pour le prix de ' . $game['prix'] . '<br/>');
}

$response->closeCursor();

echo('<br/><h3>Minuscules</h3><br/>');

$response = $database->query('SELECT LOWER(nom) AS nom_low FROM jeux_video');

while($game = $response->fetch()){
	echo($game['nom_low'] . '<br/>');
}

$response->closeCursor();

echo('<br/><h3>Longueur de chaîne de caractères</h3><br/>');

$response = $database->query('SELECT LENGTH(nom) AS nom_len FROM jeux_video');

while($game = $response->fetch()){
	echo($game['nom_len'] . '<br/>');
}

$response->closeCursor();

echo('<br/><h3>Arroundissement de chiffre décimal</h3><br/>');

// ROUND (x, y): Rounds the x value to y-decimals.
$response = $database->query('SELECT nom, ROUND(prix, 2) AS prix_rounded FROM jeux_video');

while($game = $response->fetch()){
	echo($game['nom'] . ' vendu pour ' . $game['prix_rounded'] . '<br/>');
}

$response->closeCursor();

?>