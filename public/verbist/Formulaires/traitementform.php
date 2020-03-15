<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>traitement</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" title="monstyle" href="style.css" />
    </head>
    <body>

<?php 
    
if ((empty($_POST['nom'])) or (empty($_POST['prenom'])))

	  {
		echo '<h2>Nom et Prénom obligatoires !</h2> ';
		echo '<p><a href="formulaires_exerc1.php">Retour vers la page d\'accueil</a></p>';

	  }
else
	  
	  {

			echo '<h2>Salut '.$_POST['prenom'].' '.$_POST['nom'].'.<br />
			     Bienvenue au sein de la communauté des '.$_POST['loisir']. '.</h2>';
		   	
	  }
?>	  
</body>
</html>