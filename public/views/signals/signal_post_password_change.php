<?php

switch ($_GET['signal_post_password_change']) {
    case 'succeed':
        $signal_post_password_change_message = "Votre mot de passe à bien été modifié !";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_password_change_message = "Une erreur s'est produite ! Votre mot de passe n'a pas pu être modifié !";
        $alert = "danger";
        break;

    case 'empty_old_password':
        $signal_post_password_change_message = "Veuillez entrer votre ancien mot de passe !";
        $alert = "warning";
        break;

    case 'empty_new_password':
        $signal_post_password_change_message = "Veuillez entrer un nouveau mot de passe !";
        $alert = "warning";
        break;

    case 'empty_new_password_confirmation':
        $signal_post_password_change_message = "Veuillez confirmer votre nouveau mot de passe !";
        $alert = "warning";
        break;

    case 'empty_userID':
        $signal_post_password_change_message = "Utilisateur inconnu !";
        $alert = "warning";
        break;

    case 'passwords_mismatch':
        $signal_post_password_change_message = "La confirmation de votre nouveau mot de passe ne correspond pas à votre nouveau mot de passe !";
        $alert = "warning";
        break;

    case 'incorrect_credentials':
        $signal_post_password_change_message = "Votre ancien mot de passe est incorrect !";
        $alert = "warning";
        break;

    case 'user_unknown':
        $signal_post_password_change_message = "Utilisateur introuvble !";
        $alert = "warning";
        break;
}

check_signal($signal_post_password_change_message, $alert);
