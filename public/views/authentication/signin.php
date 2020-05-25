<?php if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) { ?>

    <div class="d-flex">
        <div class="mr-auto p-2 h3">
            Bonjour <?= displayed_name($_SESSION['username'], $_SESSION['user_first_name'], $_SESSION['user_last_name']); ?> <a href="<?php if (checkPermissions('modo', false)) echo('index.php?action=admin'); else echo('#'); ?>"><span class="badge badge-<?= $role_colour ?>"><?= $role_tag ?></span></a>
        </div>
        <div class="p-2"><a class="btn btn-primary" href="index.php?action=profile">Voir votre profile</a> </div>
        <div class="p-2"><a class="btn btn-primary" href="index.php?action=basket">Voir votre panier <span class="badge badge-light"><?= $nbItems_inBasket; ?></span></a> </div>
        <div class="p-2"><a class="btn btn-secondary" href="index.php?action=signout">Déconnexion</a></div>
    </div>

<?php } else { ?>
    <div class="py-2">
        <form action="index.php?action=signin_post" method="post">
            <div class="row justify-content-center">
                <div class="col-4 form-inline">
                    <label class="pr-2" for='username'>Pseudonyme :</label>
                    <input class="form-control" type='text' id='username' name='username' />
                </div>

                <div class="col-4 form-inline">
                    <label class="pr-2" for='password'>Mot de passe :</label>
                    <input class="form-control" type='password' id='password' name='password' />
                </div>

                <div class="col-4 text-right">
                    <input class="d-inline btn btn-primary" type=submit value="Se connecter" />
                    <a class="btn btn-secondary" href="index.php?action=register">Créer un compte</a>
                </div>
            </div>
        </form>
    </div>

<?php
}
?>
