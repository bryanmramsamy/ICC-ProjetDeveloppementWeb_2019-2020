<?php

switch ($_GET['post_signin_signal']) {
    case 'connected':
        $post_signin_signal_message = "Vous vous êtes connecté(e) avec succès en tant que " . $_SESSION['username'];
        break;

    case 'inactive':
        $post_signin_signal_message = "Votre compte a été désactivé. Veuillez vous connecter avec un autre compte.";
        break;

    case 'incorrect_credentials':
        $post_signin_signal_message = "Votre pseudonyme ou votre mot de passe est incorrect. Veuillez réessayer.";
        break;

    case 'invalid_input':
        $post_signin_signal_message = "Les données entrées ne sont pas complètes. Veuillez réessayer.";
        break;

    case 'disconnected':
        $post_signin_signal_message = "Vous avez été déconnecté avec succès.";
        break;
}

echo ("<div class='signal'>" . $post_signin_signal_message . "</div>");