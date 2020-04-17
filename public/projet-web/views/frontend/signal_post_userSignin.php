<?php

switch ($_GET['signal_post_userSignin']) {
    case 'connected':
        $signal_post_userSignin = "Vous vous êtes connecté(e) avec succès en tant que " . $_SESSION['username'];
        break;

    case 'inactive':
        $signal_post_userSignin = "Votre compte a été désactivé. Veuillez vous connecter avec un autre compte.";
        break;

    case 'incorrect_credentials':
        $signal_post_userSignin = "Votre pseudonyme ou votre mot de passe est incorrect. Veuillez réessayer.";
        break;

    case 'invalid_input':
        $signal_post_userSignin = "Les données entrées ne sont pas complètes. Veuillez réessayer.";
        break;

    case 'disconnected':
        $signal_post_userSignin = "Vous avez été déconnecté avec succès.";
        break;
}

echo ("<div class='signal'>" . $signal_post_userSignin . "</div>");