<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Form input texte isset</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
<body>
<?php
$var=0 ;   //$var; $var = 2; $var = NULL ;$var = ""; $var = '';
if(isset($var))
	{ echo 'la valeur de $var n\'est pas a NULL <br />'; 
	  print( 'type et valeur de $var : ');
	  var_dump($var);
	  echo'<br />'; 
	}
else
    { echo'la valeur de $var est a NULL ou $var n\'a jamais été initialisée <br/>';
	  print( 'valeur de $var : ');
	  var_dump($var);
      echo'<br />';	  }	
	
/*$_POST['mon_champ']= NULL;*/
if (isset($_POST['mon_champ'])) {
?>

    Votre champ contenait :
    <strong><?php echo $_POST['mon_champ']; ?></strong>
    <br/><br/>
	Type et valeur du contenu entré dans le champ de saisie : 
	<?php 
	      var_dump($_POST['mon_champ']);  /*var_dump(intval($_POST['mon_champ'])); */
	
}
?>
 
<form method="POST">
    <input name="mon_champ" type="text"/>
    <input name="valider" type="submit" value="OK"/>
</form>

</body>
</html>