<?php

try {
    $database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
    die('Error : ' . $error->getMessage());
}

echo ('<h1>LEFT JOIN</h1>');

$request = $database->query('SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprio
                             FROM proprietaires AS p
                             LEFT JOIN jeux_video AS j
                             ON j.id_proprietaire = p.id');

while ($entry = $request->fetch()) {
    if (!isset($entry['nom_jeu'])) $entry['nom_jeu'] = 'NULL'; 
    echo ($entry['nom_jeu'] . ' appartient à ' . $entry['prenom_proprio'] . '<br/>');
}

$request->closeCursor();

echo ('<h1>RIGHT JOIN</h1>');

$request = $database->query('SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprio
                             FROM proprietaires AS p
                             RIGHT JOIN jeux_video AS j
                             ON j.id_proprietaire = p.id');

while ($entry = $request->fetch()) {
    if (!isset($entry['prenom_proprio'])) $entry['prenom_proprio'] = 'NULL'; 
    echo ($entry['nom_jeu'] . ' appartient à ' . $entry['prenom_proprio'] . '<br/>');
}

$request->closeCursor();