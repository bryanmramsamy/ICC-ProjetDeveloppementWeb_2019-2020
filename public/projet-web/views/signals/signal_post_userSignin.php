<?php

switch ($_GET['signal_post_userSignin']) {
    case 'connected':
        $signal_post_userSignin = "Vous vous êtes connecté(e) avec succès en tant que " . $_SESSION['username'];
        $alert = "success";
        break;

    case 'inactive':
        $signal_post_userSignin = "Votre compte a été désactivé. Veuillez vous connecter avec un autre compte";
        $alert = "warning";
        break;

    case 'incorrect_credentials':
        $signal_post_userSignin = "Votre pseudonyme ou votre mot de passe est incorrect. Veuillez réessayer";
        $alert = "warning";
        break;

    case 'invalid_input':
        $signal_post_userSignin = "Les données entrées ne sont pas complètes. Veuillez réessayer";
        $alert = "warning";
        break;

    case 'disconnected':
        $signal_post_userSignin = "Vous avez été déconnecté avec succès";
        $alert = "success";
        break;

    case 'logged_failed':
        $signal_post_userSignin = "Vous avez été connecté, mais une erreur s'est produite dans l'enregistrement de votre activité. Ceci ne devrait cependant pas nuir au confort de votre navigation";
        $alert = "warning";
        break;
}

check_signal($signal_post_userSignin, $alert);
