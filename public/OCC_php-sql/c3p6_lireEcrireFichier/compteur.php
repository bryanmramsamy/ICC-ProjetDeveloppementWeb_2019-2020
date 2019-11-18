<?php
// 1 - Ouverture du fichier
$monfichier = fopen('compteur.txt','r+');
$monautrefichier = fopen('jesus.txt','a+');
/*  
 *  r   Lecture seule
 *  r+  Lecture et écriture
 *  a   Lecture seule; fichier créé si n'existe pas 
 *  a+  Lecture et écriture; fichier créé si n'existe pas
 */

// 2 - Lecture de a première ligne du fichier
$pages_vues = fgets($monfichier);
$pages_vues += 1;

fseek($monfichier, 0);
fputs($monfichier, $pages_vues);

// 3 - Fermeture du fichier
fclose($monfichier);
fclose($monautrefichier);

echo ('<h1>Cette page à été vue '.$pages_vues.' fois !</h1>');
?>
