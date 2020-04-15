<?php

switch ($_GET['post_message_signal']) {
    case 'created':
        $post_message_signal_message = "Votre message a bien été rajouté au MiniChat !";
        break;
    
    case 'creation_failed':
        $post_message_signal_message = "Une erreur s'est produite ! Votre message n'a pas pu être rajouté !";
        break;
}

echo ("<div class='signal'>" . $post_message_signal_message . "</div>");
