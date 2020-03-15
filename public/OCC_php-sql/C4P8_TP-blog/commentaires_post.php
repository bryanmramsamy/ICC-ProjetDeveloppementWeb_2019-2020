<?php

if (isset($_POST['id_billet']) || isset($_POST['auteur']) || isset($_POST['commentaire'])) {
    
    try {
		$database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch (Exception $error) {
		die('Erreur : ' . $error->getMessage());
    }
    
    $cleaned_id_billet = htmlspecialchars($_POST['id_billet']);
    $cleaned_auteur = htmlspecialchars($_POST['auteur']);
    $cleaned_commentaire = htmlspecialchars($_POST['commentaire']);

    $request = $database->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
    $request->execute(array(
        $cleaned_id_billet,
        $cleaned_auteur,
        $cleaned_commentaire
    ));

    $request->closeCursor();
}

header('Location: commentaires.php?id_billet='.$cleaned_id_billet);

?>