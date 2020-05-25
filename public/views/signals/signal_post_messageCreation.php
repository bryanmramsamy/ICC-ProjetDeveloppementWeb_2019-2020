<?php

switch ($_GET['signal_post_messageCreation']) {
    case 'created':
        $signal_post_messageCreation_message = "Votre message a bien été rajouté au MiniChat !";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_messageCreation_message = "Une erreur s'est produite ! Votre message n'a pas pu être rajouté !";
        $alert = "danger";
        break;
}

check_signal($signal_post_messageCreation_message, $alert);
