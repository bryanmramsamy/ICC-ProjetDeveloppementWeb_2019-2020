<?php
define('MACONSTANTE','salut les gars');
echo'la valeur de la constante est : '.MACONSTANTE.'<br/>';
$var1 = "coucou"; /* commentaire sur 
plusieurs lignes $var1 = 'coucou';*/
echo $var1;
echo " Voici la valeur : $var1 <br/>"; // commmentaire  sur une ligne.On peut �dietr la valeur d'une variable entre guillemets.
echo 'Merci pour la valeur : '.$var1.'<br/>';
echo 'Voici son type accompagn� de sa valeur : ';
var_dump($var1); // fonction var_dump()  �dite le type et la valeur d'une variable pass�e en param�tre
print('<br />Sa troisi�me lettre vaut : '.$var1[2].'<br>');
echo'<br/><br/>';
$var1 = '1.5 patates'; // $var1 = '1 patate';
$var1 = $var1 + 10;  //Remarquez le transtypage auto appliqu� a $var1.Transtypage de la valeur en une valeur num�rique entra�n� par l'op�rateur arithm�tique +
echo 'valeur de \'$var1\' : '.$var1.'<br/>';
echo 'Voici son type accompagn� de sa valeur : <br/>';
var_dump($var1);
$var1 = 5;
$var1 = $var1.'coucou'; //Remarquez le transtypage auto appliqu� a $var1.Transtypage de la valeur en une cha�ne entra�n� par l'op�rateur de concat�nation'.'
echo '<br/>valeur de \'$var1\' : '.$var1.'<br/>';
echo 'Voici son type accompagn� de sa valeur : <br/>';
var_dump($var1);
$var1 = 5;
$var1 = $var1 + 'coucou'; //La cha�ne 'coucou' est transtyp�e en son �quivalent num�rique c-�-d ici la valeur 0 car elle ne contient aucun caract�re "transtypable" en 1 valeur num�rique
echo '<br/>valeur de \'$var1\' : '.$var1.'<br/>';
echo 'Voici son type accompagn� de sa valeur : <br/>';
var_dump($var1);



$var1 = 7; //$var1 = 7.0;
echo '<br/>valeur de \'$var1\' : '.$var1.'<br/>';
echo 'Voici son type accompagn� de sa valeur : <br/>';
var_dump($var1);
$resultat_division = $var1 / 2;
echo '<br/>Resultat de la division : '.$resultat_division.'<br/>';
$var1 += 2;  //$var1 *= 2; $var1 -= 2 ; $var1 /= 2 ;  etc...
echo 'valeur de \'$var1\' : '.$var1.'<br/>';
echo 'valeur de \'$var1\' : '.$var1++.'<br/>';
echo 'valeur de \'$var1\' : '.($var1 + 1) .'<br/>';
$var1 = $var1 % 3;
echo 'valeur de \'$var1\' : '.$var1.'<br/>';


$var1 = false;
echo 'valeur de \'$var1\' : '.$var1.'<br/>'; /*l'expression bool�enne n'est pas pr�vue
	pour �tre �dit�e mais bien pour �tre utilis�e dans une condition...*/ 
echo 'Voici son type accompagn� de sa valeur : <br/>';
var_dump($var1);


$var2 ; 
//$var2 = null;
echo '<br/>valeur de \'$var2\' : '.$var2.'<br/>';/*la constante sp�ciale NULL ou null n'est pas  destin�e
  � �tre �dit�e : elle est affect�e par d�faut � toute variable non initialis�e ou affect�e � une variable pour signifier
  qu'elle ne contient aucune valeur significative.
  Les deux hypoth�ses se traduisent cependant par un affichage diff�rent sur la page r�sultat*/
echo 'Voici son type accompagn� de sa valeur : <br/>';
var_dump($var2);


$couleur = 'bleu'; // $couleur = 'rouge'; $couleur = 'vert'; $couleur = 'jaune'; $couleur = 'violet'
if ($couleur == "bleu")
  {  echo '<br/>la couleur est '.$couleur.'<br/>';}
elseif ($couleur == "rouge")
  {  echo '<br/>la couleur est '.$couleur.'<br/>';}
elseif ($couleur == "vert")
  {  echo '<br/>la couleur est '.$couleur.'<br/>';} 
elseif ($couleur == 'jaune')
  {  echo '<br/>la couleur est '.$couleur.'<br/>';} 
else  
  {  echo '<br/>la couleur est '.$couleur.'<br/>';} 

$valeur = 0;  //$valeur = 0.0; $valeur = ""; $valeur = "0"; $valeur = 'a'
if($valeur)
  echo 'la valeur de l\'expression \'$valeur\' vaut true <br/>';
else
  echo 'la valeur de l\'expression \'$valeur\' vaut false <br/>';


$val1 = 2;
$val2 = 5;
while(( $val1 ) and ($val2)) // ou  while(( $val1 ) && ($val2))
 {
     print("coucou <br/>");
	 $val1--;
	 $val2--;     }
	 
$val1 = 2;
$val2 = 5;
while(( $val1 > 0 ) or ($val2 > 0)) // ou while(( $val1 > 0 ) || ($val2 > 0))
 {
     print("coucou2 <br/>");
	 $val1--;
	 $val2--;     }	
	 


for($i = 1; $i<= 5; $i++)	 
 {  echo 'je suis le traitement de la boucle for <br />';}
 
 
 do
 { echo 'je suis le traitement de la boucle do while <br />';
   $i++;  }
 while($i < 8);

$truc = 50;
switch($truc) // contrairement au switch du langage C, il est possible de tester d'autres expressions qu'une simple �galit�
{ 
 case ($truc == 20): echo'truc vaut 20<br/>';
                  break; 
 case ($truc == 30): echo'truc vaut 30<br/>';
                  break;
 case ($truc == 40): echo'truc vaut 40<br/>';
                  break;
 case ($truc <= 100): echo'truc est une valeur <= 100 differente de 20, 30 ou 40<br/>';
                  break;				  
 default : 	echo 'truc est superieur � 100';
} 

$nom = 'dominique';
salutation($nom);				  

function salutation($param)
{
echo 'Bonjour '.$param.'<br/>';
}	

function moyenne($p1,$p2)
{
return ($p1 + $p2) / 2;
}				  
echo'La moyenne des valeurs 2 et 3 vaut '.moyenne(2,3).'<br/>';	 
	 
?>
  