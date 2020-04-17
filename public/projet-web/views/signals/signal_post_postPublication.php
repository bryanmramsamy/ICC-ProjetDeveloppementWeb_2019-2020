<?php

switch ($_GET['signal_post_postPublication']) {
    case 'succeed':
        $signal_post_postPublication = "La visibilité du billet a été modifiée avec succès !";
        break;
    
    case 'failed':
        $signal_post_postPublication = "La visibilité du billet n'a pas pu être modifier. Veuillez réésayer";
        break;
}

echo ("<div class='signal'>" . $signal_post_postPublication . "</div>");
