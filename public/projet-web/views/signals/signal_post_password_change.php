<?php

switch ($_GET['signal_post_password_change']) {
    case 'succeed':
        $signal_post_password_change = "Votre mot de passe à bien été modifié !";
        break;
    
    case 'failed':
        $signal_post_password_change = "Une erreur s'est produite ! Votre mot de passe n'a pas pu être modifié !";
        break;

    case 'empty_old_password':
        $signal_post_password_change = "Veuillez entrer votre ancien mot de passe !";
        break;

    case 'empty_new_password':
        $signal_post_password_change = "Veuillez entrer un nouveau mot de passe !";
        break;

    case 'empty_new_password_confirmation':
        $signal_post_password_change = "Veuillez confirmer votre nouveau mot de passe !";
        break;

    case 'empty_userID':
        $signal_post_password_change = "Utilisateur inconnu !";
        break;

    case 'passwords_mismatch':
        $signal_post_password_change = "La confirmation de votre nouveau mot de passe ne correspond pas à votre nouveau mot de passe !";
        break;

    case 'incorrect_credentials':
        $signal_post_password_change = "Votre ancien mot de passe est incorrect !";
        break;

    case 'user_unknown':
        $signal_post_password_change = "Utilisateur introuvble !";
        break;
}

echo ("<div class='signal'>" . $signal_post_password_change . "</div>");
