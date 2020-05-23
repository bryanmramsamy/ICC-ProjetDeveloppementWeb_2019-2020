<?php
checkPermissions('modo', true);

$title = "Création d'une nouvelle catégorie";
ob_start();
?>

<h1>Création d'une nouvelle catégorie</h1>

<section>
    <form method="post" action="index.php?action=shop_category_create_post">
        <div>
            <label for='name'>Nom de la catégorie : </label>
            <input class="form-control" type='text' id='name' name='name' required/>
        </div>
        <br>
        <div class="text-right">
            <input class="btn btn-primary" type=submit value="Ajouter la catégorie" /> <a class="btn btn-secondary" href="index.php?action=shop">Annuler</a>
        </div>
    </form>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
