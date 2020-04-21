<?php

switch ($_GET['signal_post_userRegister']) {
    case 'created':
        $signal_post_userRegister_message = "Votre compte a été créé avec succès";
        $alert = "success";
        break;
}

check_signal($signal_post_userRegister_message, $alert);
