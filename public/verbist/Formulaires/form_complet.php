<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Form complet</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
<body>
<h1>Formulaire à tester sans le valider et en le validant sans entrer de valeur / en entrant des valeurs </h1>
<?php
/*$var ; */  $var = 2; /*$var = NULL;*//* $var=''*/;
if(isset($var))
	{ echo 'la valeur de $var n\'est pas a NULL <br />'; 
	  print( 'type et valeur de $var : ');
	  var_dump($var);
	  echo'<br />'; 
	}
else
    { echo'la valeur de $var est a NULL <br/>';
	  print( 'valeur de $var : ');
	  var_dump($var);
      echo'<br />';	  }	
	
/*$_POST['mon_champ']= NULL;*/
if (isset($_POST['mon_champ'])) {
?>
    Votre champ de type texte contenait :
    <strong><?php echo $_POST['mon_champ']; ?></strong>
    <br/><br/>
	Type et valeur du contenu entré dans le champ de saisie : 
	<?php 
	      var_dump($_POST['mon_champ']); /* ou var_dump(intval($_POST['mon_champ'])); */
	
}
else
{
 echo 'type et valeur du champ zone d\'édition du formulaire non validé : <br />';
        var_dump($_POST['mon_champ']);
}
?>
<br /><br />
<?php
if (isset($_POST['accord'])) {
?>
    Le champ de type checkbox a été coché et contient la valeur :
    <strong><?php echo $_POST['accord']; ?></strong>
    <br/><br/>
	Type et valeur du champ "case a cocher" : 
	<?php 
	      var_dump($_POST['accord']); /* ou var_dump(intval($_POST['accord'])); */
	
}?>
<br />
<?php
if (!isset($_POST['accord']))
{ echo 'type et valeur du champ "case a cocher" non cochée/cochée du formulaire non validé : <br />';
        var_dump($_POST['accord']);
		}
?> 
<br />
<?php
if (isset($_POST['couleur'])) {
?>
    Le champ de type radio button a été coché et contient la valeur :
    <strong><?php echo $_POST['couleur']; ?></strong>
    <br/><br/>
	Type et valeur du champ "radio button" : 
	<?php 
	      var_dump($_POST['couleur']); /* ou var_dump(intval($_POST['couleur'])); */
	
}?>
<br />
<?php
if (!isset($_POST['couleur']))
{ echo 'type et valeur du champ "radio button" non coché/coché du formulaire non validé : <br />';
        var_dump($_POST['couleur']);
		}
?> 
<br />
<?php
if (isset($_POST['age']))
{ echo 'type et valeur du champ "liste deroulante" : <br />';
        var_dump($_POST['age']);
}
else
{ echo "type et valeur du champ liste déroulante du formulaire non validé";
        var_dump($_POST['age']);
}		
		
?> 
<br />
<?php
if (isset($_POST['commentaires']))
{ echo 'type et valeur du champ "textarea" : <br />';
        var_dump($_POST['commentaires']);
}
else
{ echo "type et valeur du champ liste zone d'édition multilignes du formulaire non validé";
        var_dump($_POST['commentaires']);
}			
		
?> 

<form method="POST" >
<!-- OU<form method="POST" action="form_complet.php">-->
<p>
    Votre prénom : <br />
    <input name="mon_champ" type="text"/>
</p>
<p>	
	<input type="checkbox" name="accord"> Je suis d'accord 
<p>	
<p>	
	<input type="radio" name="couleur" value="rouge" /> Le Rouge <br />
	<input type="radio" name="couleur" value="bleu" /> Le Bleu
</p>
<p>	Votre tranche d'age :
	<select name="age"> 
	<option value="option1">10 a 30 ans</option> 
	<option value="option2">31 a 60 ans</option>
	<option value="option3">plus de 60 ans</option>
	</select>
<p>	
<p>
 Vos Commentaires : <br />
 <textarea rows="4" cols="20" name="commentaires"></textarea> <!-- observez aussi la différence si vous rajouter 
 des espaces ou des lignes entre la balise d'ouverure et de fermeture -->
		
    <input name="valider" type="submit" value="OK"/>
</form>

</body>
</html>
