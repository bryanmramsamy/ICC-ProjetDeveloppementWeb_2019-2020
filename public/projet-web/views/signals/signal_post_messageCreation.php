<?php

switch ($_GET['signal_post_messageCreation']) {
    case 'created':
        $signal_post_messageCreation = "Votre message a bien été rajouté au MiniChat !";
        break;
    
    case 'failed':
        $signal_post_messageCreation = "Une erreur s'est produite ! Votre message n'a pas pu être rajouté !";
        break;
}

echo ("<div class='signal'>" . $signal_post_messageCreation . "</div>");
