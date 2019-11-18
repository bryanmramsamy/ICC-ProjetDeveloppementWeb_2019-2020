<?php
session_start();

$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'/>
    <title>Titre de ma page</title>
  </head>
  
  <body>
    <p>
      Bonjour <?php echo($_SESSION['prenom']); ?> !<br/>
      Tu es à l'acceuil de mon site (index.php).<br/>
      Tu veux aller sur une autre page ?
    </p>
    <p>
      <a href="mapage.php">Lien vers la page mapage.php</a><br/>
      <a href="monscript.php">Lien vers monscript.php</a><br/>
      <a href="informations.php">Lien vers informations.php</a>
    </p>
  </body>


</html>
