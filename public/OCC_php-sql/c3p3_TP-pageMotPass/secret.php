<html>
  <head>
    <meta charset="utf-8" />
    <title>Page d'accès</title>
  </head>
  <body>
    <?php
    
    // Vérification de la nullité de la variable passwd reçu depuis la page formulaire.php
    if(isset($_POST['passwd']) && $_POST['passwd'] == "kangourou"){
      echo ('Code d\'accès approuvé !');
    } else if(isset($_POST['passwd'])){
      echo ('Code d\'accès refusé !');
    } else {
      echo ('Aucun code d\'accès entré !');
    }
    ?>
  </body>
</html>
