<?php

switch ($_GET['signal_post_commentCreation']) {
    case 'created':
        $signal_post_commentCreation = "Votre commentaire a bien été ajouté au billet !";
        break;
    
    case 'failed':
        $signal_post_commentCreation = "Une erreur s'est produite ! Votre commentaire n'a pas pu être ajouté au billet !";
        break;

    case 'invalid':
        $signal_post_commentCreation = "Veuillez entrer un commentaire !";
        break;

    case 'unknownID':
        $signal_post_commentCreation = "Le commentaire n'a pas pu être ajouté car le billet concerné est inconnu !";
        break;
}

echo ("<div class='signal'>" . $signal_post_commentCreation . "</div>");
