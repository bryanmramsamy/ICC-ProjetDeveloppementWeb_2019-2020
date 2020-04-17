<?php if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) { ?>
    
    <p>
        Bonjour <?= displayed_name($_SESSION['username'], $_SESSION['user_first_name'], $_SESSION['user_last_name']); ?>
        <br />
        <a href="index.php?action=profile">Voir votre profile</a>
        <br />
        <a href="index.php?action=signout">Déconnexion</a>
    </p>

<?php } else { ?>
    
    <form action="index.php?action=signin_post" method="post">

        <div>
            <label for='username'>Pseudonyme : </label>
            <input type='text' id='username' name='username' />
        </div>

        <div>
            <label for='password'>Mot de passe : </label>
            <input type='password' id='password' name='password' />
        </div>

        <div>
            <input type=submit value="Se connecter" />
        </div>

    </form>
    <p><a href="index.php?action=register">Créer un compte</a></p>

<?php
}
require('post_register_signal.php');
require('post_signin_signal.php');
?>

