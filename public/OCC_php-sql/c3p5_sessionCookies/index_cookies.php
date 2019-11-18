<?php
setcookie('pseudo', 'Michael', time() + 1*24*3600, null, null, false, true);
// Cookie attribuant une valeur à $_COOKIE['pseudo'] qui sera gardé en mémoire pour une durée d'un jour à compter de sa création. Le paramètre httpOnly a été mit à true afin d'éviter les risques de failles XSS si jamais il venait à manquer un htmlspecialchars() quelque part dans le code.
setcookie('password', 'Cahill', time() + 1*24*3600, null, null, false, true);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>La page de <?php echo($_COOKIE['pseudo']); ?></title>
  </head>
  <body>
    <?php
    if(!empty($_COOKIE['pseudo']) && isset($_COOKIE['pseudo'])){
      echo ("
        <p>
          Vous vous appelez <strong>".$_COOKIE['pseudo']."</strong> et votre mot de passe est le suivant: <strong>".$_COOKIE['password']."</strong>.
        </p>
        ");
    } else {
      echo ("Pseudo non reconnu ! Veuillez rafraichir la page !");
    }
    ?>
  </body>

</html>
