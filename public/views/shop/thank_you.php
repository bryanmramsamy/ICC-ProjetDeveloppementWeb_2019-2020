<?php
$title = "Votre panier";
ob_start();
?>

<section class="alert alert-success" role="alert">
    <h1 class="alert-heading text-center">Merci pour votre achat</h1>
    <hr>
    <p class="text-justify">
        Merci beaucoup pour votre achat, <?= $user_display_name; ?>.
        <br>
        Nous espérons vous revoir au plus vite sur notre site.
        <hr>
        Prenez soin de vous ! 
        <svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg>
    </p>
    <hr>
    <div class=row>
        <div class="col">
            <a class="btn btn-lg btn-block btn-primary" href="index.php?action=shop">Effectuer de nouveaux achats</a>
        </div>
        <div class="col">
            <a class="btn btn-lg btn-block btn-secondary" href="index.php">Retourner à l'accueil</a>
        </div>
    </div>
</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>
