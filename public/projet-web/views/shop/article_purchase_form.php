<form class="form-inline" method="post" action="index.php?action=shop_add_to_basket_post">
    <div class="form-group">
        <label for="quantity" class="sr-only">Quantity :</label>
        <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="10" placeholder="1">
    </div>

    <div class="form-group">
        <input class="btn btn-light ml-1" type="submit" value="Ajouter au panier" /> <a class="btn btn-secondary ml-1" href="index.php?action=shop">Annuler</a>
    </div>
</form>
