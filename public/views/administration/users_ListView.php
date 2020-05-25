<?php
$title = 'Liste des utilisateurs';
ob_start();
?>

<section>
    <h1>Vue administration: Liste des utilisateurs enregistrés</h1>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th colspan="6">Utilisateurs enregistrés</th>
            </tr>
            <tr>
                <th>Pseudonyme</th>
                <th>Adresse mail</th>
                <th>Rôle</th>
                <th>Date d'inscription</th>
                <th>Profil</th>
                <th>Activation</th>
            </tr>
        </thead>
        <?php while ($user = $allUsers->fetch()) { ?>
        <tbody <?php if (!$user['active']) echo("class=\"table-danger\""); ?>>
            <tr>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= permission_verbose($user['role_lvl']);; ?></td>
                <td class="text-center"><?= $user['register_date']; ?></td>
                <td class="text-center">
                    <a class="btn-sm btn-block btn-info" href="index.php?action=profile&userID=<?= $user['id']; ?>">Voir profile</a>
                </td>
                <td class="text-center">
                    <a class="btn-sm btn-block btn-<?php if ($user['active']) echo("danger"); else echo("success"); ?>" href="index.php?action=user_activation&userID=<?= $user['id']; ?>">
                        <?php if ($user['active']) echo("Désactiver"); else echo("Activer"); ?>
                    </a>
                </td>
            </tr>
        </tbody>
    <?php } ?>
    </table>
</section>

<?php
$main_section = ob_get_clean();
require('views/static/base.php');
?>
