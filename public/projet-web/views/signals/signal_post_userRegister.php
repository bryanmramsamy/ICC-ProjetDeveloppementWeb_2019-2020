<?php

switch ($_GET['signal_post_userRegister']) {
    case 'created':
        $signal_post_userRegister = "Votre compte a été créé avec succès";
        break;
}

echo ("<div class='signal'>" . $signal_post_userRegister . "</div>");
