<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Form input texte empty</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
<body>
<?php
$var = 0.0 ;  /* $var = 2;*/ /* $var = 0;*/ /* $var = 0.0;*//* $var = 0.2;*/ /* $var = "0";*/ /* $var = "";*/ /* $var = "coucou";*/ /* $var = false;*/ /* $var = true;*/
         /* $var = array( );*//* $var = array ("un", "deux");*/ /* $var = NULL;*/ /* $var ;*/
if(!(empty($var)))
	{ echo 'la valeur de $var n\'est pas a NULL ou n\'est pas 1 valeur considérée comme nulle <br />'; 
	  print( 'type et valeur de $var : ');
	  var_dump($var);
	  echo'<br />'; 
	}
else
    { echo'la valeur de $var est a NULL ou est 1 valeur considérée comme nulle <br/>';
	  print( 'type et valeur de $var : ');
	  var_dump($var);
      echo'<br />';	  }	
	
/*$_POST['mon_champ']= NULL; $_POST['mon_champ']= 0;*/
if (!(empty($_POST['mon_champ']))) {
?>
    Votre champ contenait une valeur considérée comme non nulle:
    <strong><?php echo $_POST['mon_champ']; ?></strong>
    <br/><br/>
	Type et valeur du contenu entré dans le champ de saisie : 
	<?php 
	      var_dump($_POST['mon_champ']); /* var_dump(intval($_POST['mon_champ'])); */
	
}
else {?>

    Votre champ contenait une valeur considérée comme nulle ou la valeur NULL:
    <strong><?php echo $_POST['mon_champ']; ?></strong>
    <br/><br/>
	Type et valeur du contenu entré dans le champ de saisie : 
	<?php 
	      var_dump($_POST['mon_champ']); /* ou var_dump(intval($_POST['mon_champ'])); */
	
}
?>
 
<form method="POST">
    <input name="mon_champ" type="text"/>
    <input name="valider" type="submit" value="OK"/>
</form>

</body>
</html>