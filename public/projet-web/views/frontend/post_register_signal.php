<?php

switch ($_GET['post_register_signal']) {
    case 'created':
        $post_register_signal_message = "Votre compte a été créé avec succès";
        break;
}

echo ("<div class='signal'>" . $post_register_signal_message . "</div>");
