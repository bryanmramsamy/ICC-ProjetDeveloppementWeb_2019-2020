<?php

$phrase = "Bonjour tout le monde ! Je suis une phrase !";
$longueur = strlen($phrase);
echo "La phrase ci-dessous comporte $longueur caractères : <br/>$phrase<br/>";

$ma_variable = str_replace('b', 'p', 'bim bam boum');
echo $ma_variable . "<br/>";

$phrase_melangee = str_shuffle($phrase);
echo $phrase_melangee . "<br/>";

$phrase = strtolower($phrase);
echo $phrase . "<br/>";

$phrase = strtoupper($phrase);
echo $phrase . "<br/>";

$jour = date('d');
$mois = date('m');
$annee = date('Y');

$heure = date('H');
$minute = date('i');

echo $annee . "<br/>";
echo "Bonjour ! Nous sommes le $jour/$mois/$annee et il est $heure"."h$minute <br/>";

function direBonjour($nom){
	echo "Bonjour $nom !<br/>";
}

direBonjour("Michael");
direBonjour("Anthony");
direBonjour("Daniel");
direBonjour("Lorenzo");
direBonjour("Jonathan");
direBonjour("Gary");
direBonjour("Amanda");

function volumeCone($rayon, $hauteur){
	return round(pow($rayon,2) * pi() * $hauteur * (1/3), 2);
}

$r = 3;
$h = 1;
$volume = volumeCone($r, $h);
echo "Le volume d'un cone de rayon $r et de hauteur $h est de $volume.";
?>
