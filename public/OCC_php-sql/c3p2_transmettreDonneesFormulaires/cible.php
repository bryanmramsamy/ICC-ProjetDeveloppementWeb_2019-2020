<!DOCTYPE html>
<html>
  <?php
  include("../c2p7_inclurePortionPages/entete.php");
  include("../c2p7_inclurePortionPages/menus.php");
  ?>

  <body>

    <p>
      Bonjour !
    </p>
    <!--
      htmlspecialchars() permet d'échapper les balises html inséré dans les champs texte. Ainsi, si le script <script type="text/javascript">alert("Surprise, motherfucker !")</script> est inséré dans un champs texte, celui-ci ne sera pas exécuté. Toutes les balises seront converti en &lt; pour les < et en &gt; pour les > 
      strip_tags() permet de retirer les balises html sans les interpréter
    -->
    <p>
      Je sais comment tu t'appelles. Tu t'appelles <strong><?php echo(htmlspecialchars($_POST['pseudo'])); ?></strong> et ton mot de passe est <strong><?php echo strip_tags(($_POST['password'])); ?></strong>.
    </p>
    <p>
      Le message que tu viens de rédiger est le suivant: <br/><strong><?php echo htmlspecialchars(($_POST['message'])); ?></strong>.
    </p>
    <p>
      Tu as sélectionné <strong><?php echo($_POST["pays"]); ?></strong> comme ville d'origine.
    </p>
    <p>
      <?php
      if(isset($_POST["Chelsea"])){
        echo ("Bravo, je vois que tu supportes les Blues. Tu as du goût.<br/>");
      }
      if(isset($_POST["Liverpool"])){
        echo ("Tu aimes les Reds depuis quand exactement ? Depuis qu'ils sont champions d'Europe ou d'avant ?<br/>");
      }
      if(isset($_POST["Tottenham"])){
        echo ("C'est pas la bonne année pour supporter les Spurs<br/>");
      }
      ?>
    </p>
    <p>
      <?php
      if($_POST['match'] == "victoire"){
        echo ("On va faire une bouché des Citiezen ! COME ONE CHELSEA !");
      } else if($_POST['match'] == "nul") {
        echo ("Si Chelsea se retrouve dans un mauvais jour, terminer sur un match nul est possible.");
      } else {
        echo ("Arrête de vivre dans le déni. Manchester City n'a aucune chance...");
      }
      echo ("<br/>");
      ?>
    </p>
    <p>
      Si tu veux changer de pseudonyme, <a href="index.php">clique ici</a> pour revenir à la page de formulaire <strong>index.php</strong>.
    </p>

  </body>

  <?php
  include("../c2p7_inclurePortionPages/pied_de_page.php");
  ?>
</html>
