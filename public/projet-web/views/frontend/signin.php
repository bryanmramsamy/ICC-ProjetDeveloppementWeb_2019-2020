<?php
    if (isset($_GET['post_signin_signal']) && !empty($_GET['post_signin_signal'])) {
        switch ($_GET['post_signin_signal']) {
            case 'connected':
                $post_signin_msg = "Vous vous êtes connectés avec succès en tant que " . $_SESSION['username'];
                break;

            case 'inactive':
                $post_signin_msg = "Votre compte a été désactivé. Veuillez vous connecter avec un autre compte.";
                break;

            case 'not_found':
                $post_signin_msg = "Votre compte n'existe pas. Veuillez vous créer un compte.";
                break;

            case 'invalid_input':
                $post_signin_msg = "Les données entrées sont incorrectes. Veuillez réessayer.";
                break;

            case 'disconnected':
                $post_signin_msg = "Vous avez été déconnecté avec succès.";
                break;
        }

        echo("<strong>" . $post_signin_msg . "</strong>");

    }


    if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
?>
    
    <p>
        Bonjour <?= $_SESSION['username'] ?>
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
