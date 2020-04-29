<?php
$title = "Page non trouvée";
ob_start();
?>

<section class="alert alert-dark" role="alert">
    <h1 class="alert-heading text-center">PAGE NON TROUVÉE</h1>
    <hr>
    <p class="text-justify">
       La page à laquelle vous tentez d'accéder n'existe pas ou n'a pas pu être trouvée.
        <br/><br/>
        Veuillez réessayer d'accéder à la page correspondante.
        <br/>
        Si le problème persiste, veuillez prendre contacte avec un modérateur ou un adminstrateur du site en entrant une requête ici.
    </p>
    <hr>
    <a class="btn btn-lg btn-block btn-dark" href="index.php">Retourner à l'accueil</a>
</section>

<?php
$main_section = ob_get_clean();

require('base.php');
?>
