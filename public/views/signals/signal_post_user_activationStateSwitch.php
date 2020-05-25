<?php

switch ($_GET['signal_post_user_activationStateSwitch']) {
    case 'succeed':
        $signal_post_user_activationStateSwitch_message = "Le statut d'activation de l'utilisateur a correctement été modifié";
        $alert = "success";
        break;

    case 'failed':
        $signal_post_user_activationStateSwitch_message = "Le status d'activation de l'utilisateur n'a pas pu être modifié !";
        $alert = "danger";
        break;
    
    case 'not_found':
        $signal_post_user_activationStateSwitch_message = "Utilisateur à (dés)activer inconnu";
        $alert = "warning";
        break;
}

check_signal($signal_post_user_activationStateSwitch_message, $alert);
