<?php

$age = 1;

if($age <= 12){
	echo "Salut gamin ! Bienvenue sur ton site !<br/>";
	$autorisation_entrer = true;
} else {
	echo "Ceci est un site pour enfants, vous êtes trop vieux pour pouvoir entrer. Aurevoir !<br/>";
	$autorisation_entrer = false;
}

echo "Avez-vous l'autorisation d'entrer ? La réponse est : $autorisation_entrer <br/>";

if($autorisation_entrer){
	echo "Bienvenue petit nouveau. :o";
} else {
	echo "Tu n'as pas le droit d'entrer !";
}

echo "<br/>";

$langue = "anglais";

if ($age <= 12 && $langue == "français"){
	echo "Bienvenue sur mon site !";
} elseif ($age <= 12 && $langue == "anglais"){
	echo "Welcome on my website !";
}

echo "<br/>";

$pays = "France";

if ($pays == "France" || $pays == "Belgique"){
	echo "Bienvenue sur mon site !";
} else {
	echo "Désolé, notre service n'est pas encore disponible dans votre pays !";
}

echo "<br/>";

$variable = 23;

if($variable ==23){
?> <!---L'accolade ne peut pas être mise sur la même ligne que la fermture de la balise php--->
<strong>Bravo !</strong> Vous avez trouvé le nombre mystère !
<?php
}

echo "<br/>";

$note = 3;

switch ($note){
	case 1:
		echo "Insatisfait !";
	break;
	case 2:
		echo "Mécontent";
	break;
	case 3:
		echo "Mitigé";
	break;
	case 4:
		echo "Satisfait";
	break;

	case 5:
		echo "Très satisfait !";
	break;
	default:
		echo "Non noté";
}

echo "hehe<br/>";

$majeur = ($age >= 18) ? true : false;
if($majeur){
	echo "Vous êtes leader !";
} else {
	echo "Game over !";
}

?>
