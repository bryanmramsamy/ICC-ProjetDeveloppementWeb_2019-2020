<?php
if (checkPermissions('modo', false)){    
    # Visibility option (admin only)
    $make_available_link = "index.php?action=shop_article_change_availability&articleID=" . $article['id'];

    if ($article['availability']) echo("<a class=\"btn btn-info ml-1\" href='" . $make_available_link . "'>Rendre l'article indisponible</a>");
    else if (checkPermissions('admin', false)) echo ("<a class=\"btn btn-info ml-1\" href='" . $make_available_link . "'>Rendre l'article disponible</a>");

    echo(' ');

    # Update option
    echo ("<a class=\"btn btn-info ml-1\" href=\"index.php?action=shop_article_update&articleID=" . $article['id'] . "\">Modifier l'article</a>");
}
