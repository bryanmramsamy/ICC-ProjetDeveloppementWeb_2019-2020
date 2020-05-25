<?php
$title = 'Profile de ' . $user['username'];

ob_start();
?>

<section class="container border pb-3">
    <br>
    <section class="h5 container border pt-3">
        <div class="row">
            <div class="col">Pseudonyme:</div>
            <div class="col"><?= $user['username']; ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col">Adresse électronique:</div>
            <div class="col"><?= $user['email']; ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col">Date d'inscription:</div>
            <div class="col"><?= $user['register_date']; ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col">Prénom:</div>
            <div class="col"><?= $user['first_name']; ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col">Nom de famille:</div>
            <div class="col"><?= $user['last_name']; ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col">Adresse:</div>
            <div class="col"><?= $user['address'];; ?><br/><?= $user['zipcode']; ?></div>
        </div>
        <hr>
        <div class="row">
            <div class="col">Date de naissance:</div>
            <div class="col"><?= $user['date_birth']; ?></div>
        </div>
        <hr>

        <div class="text-right pb-2">
            <a class="btn btn-primary" href="index.php?action=profile_update">Modifier votre profile d'utilisateur</a>
            <a class="btn btn-secondary" href="index.php?action=password_change">Changer votre mot de passe</a>
        </div>
    </section>

    <section>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th colspan="4">Nombre de connexion récentes</th>
                </tr>
                <tr>
                    <th>Dernières 24 heures</th>
                    <th>Derniere semaine</th>
                    <th>Dernier mois</th>
                    <th>Dernière annéee</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $userLogs_lastDay; ?> connection(s)</td>
                    <td><?= $userLogs_lastWeek; ?> connection(s)</td>
                    <td><?= $userLogs_lastMonth; ?> connection(s)</td>
                    <td><?= $userLogs_lastYear; ?> connection(s)</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th colspan="4">Liste des commandes effectuées</th>
                </tr>
                <tr>
                    <th>Numéro de commande</th>
                    <th>Nombre total d'article</th>
                    <th>Prix total de la commande</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <?php while ($order = $user_orders->fetch()) { ?>
                <tbody>
                    <tr>
                        <td>XXXX-XXXX<?= $order['id']; ?></td>
                        <td class="text-center"><?php echo $orderManager->getNumberItems($order['id']); ?></td>
                        <td class="text-right">€ <?= number_format((float)$order['total'], 2, ',', ''); ?></td>
                        <td class="text-center"><a class="btn-sm btn-block btn-primary" href="index.php?action=order_details&orderID=<?= $order['id']; ?>">Voir la commande</a></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </section>

    <section>
        
    </section>

</section>

<?php
$main_section = ob_get_clean();
require('views/static/base.php');
?>
