<?php

try {
    $database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
    die('Error : ' . $error->getMessage());
}

echo ('<h1>Ancienne syntaxe: WHERE</h1>');
// $request = $database->query('SELECT nom, prenom FROM proprietaires, jeux_video');
    // Won't work because 'nom' is used in 'proprietaires' and in 'jeux_video' as well !

$request = $database->query('SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprio
                             FROM proprietaires AS p, jeux_video AS j
                             WHERE j.id_proprietaire = p.id');

while ($entry = $request->fetch()) {
    echo ($entry['nom_jeu'] . ' appartient à ' . $entry['prenom_proprio'] . '<br/>');
}

$request->closeCursor();

echo ('<br/><h1>Nouvelle syntaxe: JOIN</h1>');
echo ('<br/><h2>INNER JOIN</h2>');

$request = $database->query('SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprio
                             FROM proprietaires AS p
                             INNER JOIN jeux_video AS j
                             ON j.id_proprietaire = p.id');
                          // WHERE j.console = 'PC',
                          // ORDER BY prix DESC
                          // LIMIT 0, 10

while ($entry = $request->fetch()) {
    echo ($entry['nom_jeu'] . ' appartient à ' . $entry['prenom_proprio'] . '<br/>');
}

$request->closeCursor();

echo ('<br/><h2>INNER JOIN avec un filtre sur la console, ordonné par prix décroissant en affichant que les 10 premiers résultats</h2>');

$request = $database->query('SELECT j.nom AS nom_jeu, p.prenom AS prenom_proprio
                             FROM proprietaires AS p
                             INNER JOIN jeux_video AS j
                             ON j.id_proprietaire = p.id
                             WHERE j.console = \'PC\'
                             ORDER BY prix DESC
                             LIMIT 0, 10');

while ($entry = $request->fetch()) {
    echo ($entry['nom_jeu'] . ' appartient à ' . $entry['prenom_proprio'] . '<br/>');
}

$request->closeCursor();

?>