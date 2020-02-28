<?php
session_start();

# Read cookies if they exists
if(isset($_COOKIE['pseudo']) && !empty($_COOKIE['pseudo'])
    && isset($_COOKIE['pass']) && !empty($_COOKIE['pass'])){
    
    $_SESSION['pseudo'] = htmlspecialchars($_COOKIE['pseudo']);
    $_SESSION['pass'] = htmlspecialchars($_COOKIE['pass']);
    
}

# Redirect user if already signed in
if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) header('Location: connexion-post.php');

?> 

<h1>Page de connexion</h1>
<form method="post" action="connexion-post.php">
    <label for='pseudo'>Pseudo</label>
    <input name='pseudo' required/>
    
    <br/>

    <label for='password'>Mot de passe</label>
    <input name='password' type='password' required/>

    <br/>

    <?php if ($_GET['unknown_member']) echo('<strong>Pseudonyme ou mot de passe inconnu. Veuillez réésayer.</strong><br/> Pas encore inscrit ? <a href="inscription.php">Veuillez vous inscrire ici</a>.'); ?>

    <br/>

    <label for="auto_sign_in">Connexion automatique</label>
    <input type="checkbox" name="auto_sign_in" id="auto_sign_in"/>

    <input type='submit' value="Se connecter"/>
</form>


