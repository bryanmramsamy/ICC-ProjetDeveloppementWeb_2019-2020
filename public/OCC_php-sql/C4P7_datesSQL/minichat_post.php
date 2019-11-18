<?php

// Blank pseudo or blank message cases
if (!isset($_POST['pseudo']) || !isset($_POST['message'])) {

	if (isset($_POST['message'])) {
		$errorMsg = 'pseudo';
	} else {
		$errorMsg = 'commentaire';
	}
	
/*	echo ('Vous n\'avez pas entré de ' . $errorMsg . ' ! Votre commentaire n\'a pas été rajouté.
		<br/>
		Vous allez être redirigé. Veuillez réessayer.');
*/

} else {

	// Access to database via DPO
	try {
		$database = new PDO('mysql:host=mysql;dbname=test;charset=utf8', 'root', 'admin', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch (Exception $error) {
		die('Erreur : ' . $error->getMessage());
	}

	// XSS vulnerability inputcheck
	$newPseudo = htmlspecialchars($_POST['pseudo']);
	$newMessage = htmlspecialchars($_POST['message']);

	// Data insertion
	$newCommentRequest = $database->prepare('INSERT INTO minichat (pseudo, message) VALUES(:inputPseudo, :inputMessage)');
	$newCommentRequest->execute(array(
			'inputPseudo' => $newPseudo,
			'inputMessage' => $newMessage
		));

	// Close database reading
	$newCommentRequest->closeCursor();
}

// Redirection to minichat.php
// Input not allowed with this function !!! No echo or print before that !
header('Location: minichat.php');
?>