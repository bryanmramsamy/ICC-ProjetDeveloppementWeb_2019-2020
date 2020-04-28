<?php
checkPermissions('user', true);

$title = "Modification du profile de " . $user['username'];
ob_start();
?>

<h1>Modification du profile (<?= $user['username']; ?>)</h1>

<section id="profile_UpdateForm">

    <h2>Modifier votre profile</h2>

    <form method="POST" action="index.php?action=profile_update_post&userID=<?= $user['userID']; ?>">

        <?php require('views/signals/signal_post_profileUpdate.php'); ?>

        <div>
            <input type='hidden' id='userID' name='userID' value='<?= $user['id']; ?>' required/>
        </div>

        <div>
            <label for='email'>Adresse e-mail : </label>
            <input type='email' id='email' name='email' value='<?= $user['email']; ?>'/>
        </div>

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

</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
