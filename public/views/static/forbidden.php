<?php
$title = "Accès interdit";
ob_start();
?>

<section class="alert alert-danger" role="alert">
    <h1 class="alert-heading text-center">ACCÈS INTERDIT</h1>
    <hr>
    <p class="text-justify">
        Vous venez de tenter d'accéder à une page nécessitant des acréditations spéciales qui n'ont pas été accordées à votre compte, ni aux invités.
        <br/><br/>
        Si vous possédez un autre compte d'utilisateur disposant des bonnes accréditations, veuillez vous connecté avec le compte en question et réessayer.
        <br/>
        Autrement, veuillez prendre contacte avec un modérateur ou un adminstrateur du site en entrant une requête ici.
    </p>
    <hr>
    <a class="btn btn-lg btn-block btn-danger" href="index.php">Retourner à l'accueil</a>
</section>

<?php
$main_section = ob_get_clean();

require('base.php');
?>
