<!DOCTYPE html>
<html>
  <body>
    <?php
    // Vérification de l'existance du fichier et si celui-ci a bien été envoyé sans erreur
    if (isset($_FILES['monfichier']) &&  $_FILES['monfichier']['error'] == 0){
      
      // Vérification taille du fichier ne dépassant pas 1'000'000 bytes
      if ($_FILES['monfichier']['size'] <= 1000000) {
        
        // Récupération de l'extension du fichier
        $infofichier = pathinfo($_FILES['monfichier']['name']);
        $extension_upload = $infofichier['extension'];
        // Tableau des extensions acceptées
        $extensions_autorisees = array('jpg','jpeg','gif','png');
        if (in_array($extension_upload, $extensions_autorisees)){
          echo ("LE FICHIER A ETE ACCEPTE ! MERCI BEAUCOUP" . $_POST['expediteur'] . "!");
      
          // Validation et stockage du fichier
          move_uploaded_file($_FILES["monfichier"]["tmp_name"], 'uploads/' . basename($_FILES['monfichier']['name']));
          echo ("Envoi du fichier effectué avec succès !");

        } else {
          echo ("Mauvaise extension de fichier !");
        }
      } else {
        echo ("Fichier trop lourd !");
      }
    } else {
      echo ("Erreur de téléchargement du fichier !");
      $var = $_FILES['monfichier']['error'];
      echo ($var);
    }
    ?>
  </body>
</html>
