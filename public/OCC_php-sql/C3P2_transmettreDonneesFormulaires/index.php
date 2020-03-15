<!DOCTYPE html>
<html>
  <?php
  include("../c2p7_inclurePortionPages/entete.php");
  include("../c2p7_inclurePortionPages/menus.php");
  ?>
	
  <body>

    <form method="post" action="cible.php">
      <p>
        On insèrera ici les éléments de notre formulaire.
      </p>
      <!-- Champs texte classique -->
      <input type="text" name="pseudo"/>
      <!-- Champs texte mot de passe: les caractères entrés apparraissent sous forme de points -->
      <input type="password" name="password"/>
      <br/><br/>
      <!-- Zone de saisi multiligne avec un message pré-écrit en sont sein -->
      <textarea name="message" rows="8" cols="45">Votre message ici.</textarea>
      <br/><br/>
      <!-- Dropdown list avec un choix pré-sélectionné -->
      <p>De quel pays viens-tu ?
        <select name="pays">
          <option value="Angleterre">ENGLAND</option>
          <option value="France">FRANCE</option>
          <option value="Belgique" selected="selected">BELGIUM</option>
          <option value="Allemagne">GERMANY</option>
          <option value="Pays-Bas">NETHERLANDS</option>
        </select>
      </p>
      <!-- Checkboxes avec des choix précochés -->
      <p>
        Selectionnez les bonnes équipes de Premier League.
      </p>
      <input type="checkbox" name="Chelsea" id="che" checked="checked"/><label for="che">Chelsea Football Club</label>
      <input type="checkbox" name="Liverpool" id="liv"/><label for="liv">Liverpool Football Club</label>
      <input type="checkbox" name="Tottenham" id="tot"/><label for="tot">Tottenham Football Club</label>
      <br/><br/>
      <!-- Radio buttons -->
      <p>
        Qui gagnera entre Manchester City et Chelsea ?
      </p>
      <input type="radio" name="match" value="victoire" id="win" checked="checked"/><label for="win">Chelsea va gagner !</label>
      <input type="radio" name="match" value="nul" id="draw"/><label for="draw">Ce match sera trop équilibré, je vote pour un partage.</label>
      <input type="radio" name="match" value="defaite" id="lose"/><label for="lose">Manchester City risque de vaincre les Blues...</label>
      <br/><br/>
      <input type="submit" value="Chocolat"/>
    </form>

    <h1>Ce second formulaire sert à envoyer des fichiers</h1>
    <!-- enctype permet de faire comprendre au navigateur de se prérarer à envoyer de fichiers -->
    <form method="post" action="cibleEnvoi.php" enctype="multipart/form-data">
      <p>
        Formulaire d'envoi de fichier.
        <input type="file" name='monfichier'/><br/>
        Nom de l'expéditeur: <input type="text" name="expediteur"/><br/>
        <input type="submit" value="Env"/>
      </p>
    </form>
  </body>
  
  <?php
  include("../c2p7_inclurePortionPages/pied_de_page.php");
  ?>
</html> 
