<?php
checkPermissions('user', true);

$title = "Modification du profile de &laquo;" . $user['username'] . "&raquo";
ob_start();
?>

<section>
    <h1>Modification du profile &laquo;<?= $user['username']; ?>&raquo;</h1>

    <form method="POST" action="index.php?action=profile_update_post&userID=<?= $user['userID']; ?>">
        <div>
            <input type='hidden' id='userID' name='userID' value='<?= $user['id']; ?>' required/>
        </div>

        <div class="form-group">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" readonly class="form-control-plaintext" id="username" value='<?= $user['username']; ?>'>
        </div>

        <div class="form-group">
            <label for='email'>Adresse e-mail : </label>
            <input class="form-control" type='email' id='email' name='email' value='<?= $user['email']; ?>'/>
        </div>

        <div class="form-group">
            <label for='first_name'>Prénom : </label>
            <input class="form-control" type='text' id='first_name' name='first_name' value='<?= $user['first_name']; ?>'/>
        </div>

        <div class="form-group">
            <label for='last_name'>Nom de famille : </label>
            <input class="form-control" type='text' id='last_name' name='last_name' value='<?= $user['last_name']; ?>'/>
        </div>

        <div class='row'>
            <div class="col-8 form-group">
                <label for='address'>Adresse : </label>
                <input class="form-control" type='text' id='address' name='address' value='<?= $user['address']; ?>'/>
            </div>

            <div class="col-4 form-group">
                <label for='zipcode'>Code postal : </label>
                <input class="form-control" type='text' id='zipcode' name='zipcode' value='<?= $user['zipcode']; ?>'/>
            </div>
        </div>

        <div class="form-group">
            <label for="birthday">Date de naissance:</label>
            <input class="form-control" type="date" id="birthday" name="birthday" value='<?= $user['date_birth']; ?>'/>
        </div>

        <div class="text-right">
            <input class="btn btn-primary" type=submit value="Appliquer les changements au profile" />
            <a class="btn btn-secondary" href="index.php?action=profile<?php if (checkPermissions('admin', false)) echo ("&userID=" . $user['id']);?>">Annuler</a>
        </div>
    </form>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
