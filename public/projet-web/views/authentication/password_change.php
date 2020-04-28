<?php
checkPermissions('user', true);

$title = "Changement de mot de passe";
ob_start();
?>

<h1>Changer votre mot de passe</h1>

<section id="password_UpdateForm">

    <form method="POST" action="index.php?action=password_change_post">

        <?php require('views/signals/signal_post_password_change.php'); ?>

        <div>
            <input type='hidden' id='userID' name='userID' value='<?= $user['id']; ?>' required/>
        </div>

        <div>
            <label for='old_password'>Ancien mot de passe : </label>
            <input type='password' id='old_password' name='old_password'/>
        </div>

        <div>
            <label for='new_password'>Nouveau mot de passe : </label>
            <input type='password' id='new_password' name='new_password'/>
        </div>

        <div>
            <label for='new_password_confirmation'>Confirmation du nouveau mot de passe : </label>
            <input type='password' id='new_password_confirmation' name='new_password_confirmation'/>
        </div>

        <div>
            <input type=submit value="Changer le mot de passe" /> <a href="index.php?action=profile<?php if (checkPermissions('admin', false)) echo ("&userID=" . $user['id']);?>">Annuler</a>
        </div>

    </from>

</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
