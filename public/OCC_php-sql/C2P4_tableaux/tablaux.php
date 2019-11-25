<?php

$prenoms = array("Michael","Anthony","Daniel","Lorenzo","Jonathan","Gary","Amanda");

for($i = 0; $i <= 6; $i++){
	echo $prenoms[$i] . "<br/>";
}

echo "<br/>";

$noms[0] = "Cahill";
$noms[1] = "Galentine";
$noms[2] = "Jenkins";
$noms[3] = $noms[1];
$noms[] = "Taylor";
$noms[] = "Johnson";
$noms[] = "Pearce";

for($i = 0; $i <= 6; $i++){
	echo $noms[$i] . "<br/>";
}


$coordonnees = array (
	"prenom" => "Ronald",
	"nom" => "Hood",
	"adresse" => "Base ZEUS-1",
	"ville" => "Londres");

echo "<br/>".$coordonnees["ville"]."<br/><br/>";

foreach($prenoms as $element){
	echo "$element <br/>";
}

echo "<br/>";

foreach($coordonnees as $jaune => $vert){
	echo "$vert is de value of $jaune <br/>";
}

echo "<br/>";

print_r($coordonnes);

echo "<br/><pre>";
print_r($coordonnees);
echo "</pre><br/>";

if(array_key_exists("nom", $coordonnees)){
	echo "La clé 'nom' se trouve dans les coordonnées !";
}

if(array_key_exists("pays", $coordonnees)){
	echo "La clé 'pays' se trouve dans les coordonnées !";
}

if(in_array("Londres", $coordonnees)){
	echo "La valeur 'Londres' se trouve dans les coordonnées !";
}

if(in_array("Hudson", $coordonnees)){
	echo "La valeur 'Hudson' se trouve dans les coordonnées !";
}

$position = array_search("Cahill", $noms);
echo "'Cahill' se trouve en position $position";

$position = array_search("Base ZEUS-1", $coordonnees);
echo "'Base ZEUS-1' se trouve en position $position";

?>
