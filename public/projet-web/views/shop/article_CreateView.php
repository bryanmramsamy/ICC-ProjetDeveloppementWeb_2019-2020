<?php
checkPermissions('modo', true);

$title = "Création d'un nouvel Article";
ob_start();
?>

<h1>Création d'un nouvel article</h1>

<section>
    <form id="new_article" method="post" action="index.php?action=shop_article_create_post">
        <div>
            <label for='name'>Nom de l'article : </label>
            <input class="form-control" type='text' id='name' name='name' required/>
        </div>

        <div>
            <label for='category'>Catégorie de l'article</label>
            <select class="custom-select" id='category' name='categorieID' form="new_article" required>
                <?php while ($category = $categories->fetch()){ ?>
                    <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                <?php
                }
                $categories->closeCursor(); 
                ?>
            </select>
        </div>

        <div class="my-2">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="permission_lvl" id="user" value="10" checked>
                <label class="form-check-label" for="user">Disponible pour tous les membres</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="permission_lvl" id="premium" value="20">
                <label class="form-check-label" for="premium">Disponibles pour les membres prémium et les VIP</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="permission_lvl" id="vip" value="30">
                <label class="form-check-label" for="vip">Disponible pour les membres VIP uniquement</label>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for='unit_price'>Prix unitaire de l'article : </label>
                <input class="form-control" type="number" id="unit_price" name="unit_price" step='0.01' placeholder="EUR" required>
            </div>

            <div class='col'>
                <label for='quantity_left'>Quantité d'articles disponible : </label>
                <input class="form-control" type="number" id="quantity_left" name="quantity_left" step='1' required>
            </div>
        </div>

        <div>
            <label for='description'>Description de l'article : </label>
            <br/>
            <textarea class="form-control" name="description" rows="4" cols="45" required></textarea>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="availability" name="availability" value="1" checked>
            <label class="form-check-label" for="availability">Rendre l'article disponible ?</label>
        </div>

        <div class="text-right">
            <input class="btn btn-primary" type=submit value="Ajouter l'article" /> <a class="btn btn-secondary" href="index.php?action=shop">Annuler</a>
        </div>
    </form>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
