<!DOCTYPE html>
<html>
  <?php
  include("../c2p7_inclurePortionPages/entete.php");
  include("../c2p7_inclurePortionPages/menus.php");
  ?>
	
  <body>
    <p>
    <?php
    /*
     *  Toujours vérifier les données entrés par l'utilisateur.
     *  Il peut modifier les données passées dans l'URL et faire planter le code.
     *  La fonction isset() permet de vérifier l'existance d'une valeur dans la variable.
     *  VÉRIFICATION À FAIRE IMPÉRATIVEMENT LORS D'UNE ENTRÉE UTILISATEUR !!
     */
    if(isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['repeter'])){
      // Forcer le casting de la valeur. Si la valeur n'est pas un int, 0 sera attribué
      $_GET['repeter'] = (int)$_GET['repeter'];
      
      $maxValue = 14;
      if($_GET['repeter'] > 0 && $_GET['repeter'] < $maxValue){
        for($i = 0; $i < $_GET['repeter']; $i++){
          echo ('Bonjour '.$_GET['prenom'].' '.$_GET['nom'].' !<br/>');
        }
      }

    } else {
      echo ('Veuillez renseigner un nom, un prénom et un nombre de répétitions!');
    }

    ?>
    </p>
  </body>

  <?php
  include("../c2p7_inclurePortionPages/pied_de_page.php");
  ?>
</html> 

