<?php
    switch ($_GET['post_signin_signal']) {
        case 'connected':
            $post_signal_msg = "Vous vous êtes connectés avec succès en tant que " . $_SESSION['username'];
            break;

        case 'inactive':
            $post_signal_msg = "Votre compte a été désactivé. Veuillez vous connecter avec un autre compte.";
            break;

        case 'incorrect_credentials':
            $post_signal_msg = "Votre pseudonyme ou votre mot de passe est incorrect. Veuillez réessayer.";
            break;

        case 'invalid_input':
            $post_signal_msg = "Les données entrées ne sont pas complètes. Veuillez réessayer.";
            break;

        case 'disconnected':
            $post_signal_msg = "Vous avez été déconnecté avec succès.";
            break;
    }

    if ($_GET['post_register_signal'] == 'created') {
        $post_signal_msg = "Votre compte a été créé avec succès.";
    }

    echo("<strong>" . $post_signal_msg . "</strong>");

    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
?>
    
    <p>
        Bonjour <?= $_SESSION['username'] ?>
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

<?php } ?>
