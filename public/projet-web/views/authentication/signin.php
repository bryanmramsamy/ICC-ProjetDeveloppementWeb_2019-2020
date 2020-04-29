<?php if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) { ?>

    <div class="d-flex">
        <div class="mr-auto p-2 h3 text-primary">Bonjour <?= displayed_name($_SESSION['username'], $_SESSION['user_first_name'], $_SESSION['user_last_name']); ?></div>
        <div class="p-2"><a class="btn btn-primary" href="index.php?action=profile">Voir votre profile</a> </div>
        <div class="p-2"><a class="btn btn-secondary" href="index.php?action=signout">Déconnexion</a></div>
    </div>

<?php } else { ?>
    <div>
        <form action="index.php?action=signin_post" method="post">
            <div class="d-flex">
                <div class="form-group form-inline mr-auto p-2">
                    <label for='username'>Pseudonyme : </label>
                    <input class="form-control" type='text' id='username' name='username' />
                </div>

                <div class="form-group form-inline mr-auto p-2">
                    <label for='password'>Mot de passe : </label>
                    <input class="form-control" type='password' id='password' name='password' />
                </div>

                <div class="p-2">
                    <input class="btn btn-primary" type=submit value="Se connecter" /> 
                </div>

                <div class="p-2">
                    <a class="btn btn-secondary" href="index.php?action=register">Créer un compte</a>
                </div>
            </div>
        </form>
    </div>

<?php
}
?>
