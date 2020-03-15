<?php

/*
 *  This code is used to assign an id_proprietaire to each possesseur.
 */

// Access to database
try {
    $database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $error) {
    die('Error : ' . $error->getMessage());
}

$request = $database->query('SELECT possesseur, id_proprietaire FROM jeux_video');
$possesseurs = array();
// Add every possesseur in an array
while ($game = $request->fetch()) {

    if ( !in_array($game['possesseur'], $possesseurs) ) {
        array_push($possesseurs, $game['possesseur']);
        $id = array_search($game['possesseur'], $possesseurs);

        // Give the possesseur an id_proprietaire
        $request2 = $database->prepare('UPDATE jeux_video SET id_proprietaire = ? WHERE possesseur = ?');
        $request2->execute(array(
            $id + 1,
            $game['possesseur']
        ));
        $request2->closeCursor();

    }
}

$request->closeCursor();

echo ('CODE EXECUTED SUCCESSFULY !');

?>