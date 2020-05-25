<?php

switch ($_GET['signal_post_userRegister']) {
    case 'created':
        $signal_post_userRegister_message = "Votre compte a été créé avec succès";
        $alert = "success";
        break;
        
    case 'failed':
        $signal_post_userRegister_message = "Votre compte n'a pas pu être créé !";
        $alert = "danger";
        break;

    case 'passwords_mismatch':
        $signal_post_userRegister_message = "Les mots de passe ne correspondent pas ! Veuillez rééssayer";
        $alert = "warning";
        break;

    case 'already_exist':
        $signal_post_userRegister_message = "Le nom d'utilisateur est déjà utilisé ! Veuillez en choisir un autre ou vous connecter s'il est question de votre compte";
        $alert = "warning";
        break;

    case 'invalid_inputs':
        $signal_post_userRegister_message = "Les données saisies ne sont pas valides ! Veuillez rééssayer";
        $alert = "warning";
        break;

    case 'logged_failed':
        $signal_post_userSignin = "Votre compte a correctement été créé et vous êtes désormais connecté, mais une erreur s'est produite dans l'enregistrement de votre activité. Ceci ne devrait cependant pas nuir au confort de votre navigation";
        $alert = "warning";
        break;
}

check_signal($signal_post_userRegister_message, $alert);
