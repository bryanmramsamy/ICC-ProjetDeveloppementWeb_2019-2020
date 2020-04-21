<?php
checkPermissions('user', true);

$title = "Modification du profile de " . $user['username'];
ob_start();
?>

<h1>Modification de votre profile (<?= $user['username']; ?>)</h1>

<section id="password_UpdateForm">

    <h2>Changer votre mot de passe</h2>

    <form method="POST" action="index.php?action=password_change_post">

        <?php # require('views/signals/signal_post_paasword_change.php'); ?>

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

<section id="profile_UpdateForm">

    <form method="POST" action="index.php?action=profile_update_post&userID=<?= $user['userID']; ?>">

        <?php # require('views/signals/signal_post_profileUpdate.php'); ?>

        <div>
            <label for='first_name'>Prénom : </label>
            <input type='text' id='first_name' name='first_name' value='<?= $user['first_name']; ?>'/>
        </div>

        <div>
            <label for='last_name'>Nom de famille : </label>
            <input type='text' id='last_name' name='last_name' value='<?= $user['last_name']; ?>'/>
        </div>

        <div>
            <label for='address'>Adresse : </label>
            <input type='text' id='address' name='address' value='<?= $user['address']; ?>'/>
        </div>

        <div>
            <label for='zipcode'>Code postal : </label>
            <input type='text' id='zipcode' name='zipcode' value='<?= $user['zipcode']; ?>'/>
        </div>

        <div>
            <label for="birthday">Date de naissance:</label>
            <input type="date" id="birthday" name="birthday" value='<?= $user['date_birth']; ?>'/>
        </div>

        <div>
            <input type=submit value="Modifier le profil" /> <a href="index.php?action=profile<?php if (checkPermissions('admin', false)) echo ("&userID=" . $user['id']);?>">Annuler</a>
        </div>

    </form>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
