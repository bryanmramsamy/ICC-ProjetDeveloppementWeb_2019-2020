<?php
session_start();

if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) header('Location: accueil.php');
?>

    <h1>Formulaire d'inscription</h1>
    <form method="post" action="inscription-post.php">
        <label for='pseudo'>Pseudo</label>
        <input name='pseudo' required/>
        
        <br/>

        <?php if ($_GET['error_pseudo']) echo('<strong>Pseudonyme invalide. Veuilelz réésayer.</strong>'); ?>

        <label for='password'>Mot de passe</label>
        <input name='password' type='password' required/>

        <br/>

        <label for='confirm_password'>Confirmation du mot de passe</label>
        <input name='confirm_password' type='password' required/>

        <?php if (!empty($_GET['error_password'])) echo('<strong>La confirmation de votre mot de passe ne correspond pas à votre mot de passe d\'origine ! Veuillez réésayer.</strong>'); ?>

        <br/>

        <label for='mail'>Adresse mail</label>
        <input name='mail' type='email' required/>

        <?php if ($_GET['error_mail']) echo('<strong>Votre adresse mail n\'est pas valide ! Veuillez réésayer avec une autre adresse.</strong>'); ?>

        <input type='submit' value="S'inscrire"/>
    </form>
