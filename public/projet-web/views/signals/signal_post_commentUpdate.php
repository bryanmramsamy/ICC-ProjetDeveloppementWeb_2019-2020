<?php

switch ($_GET['signal_post_commentUpdate']) {
    case 'updated':
        $signal_post_commentUpdate_msg = "Le commentaire correctement été modifié";
        $alert = "success";
        break;
    
    case 'failed':
        $signal_post_commentUpdate_msg = "Le commentaire n'a pas pu être modifié !";
        $alert = "danger";
        break;
}

check_signal($signal_post_commentUpdate_msg, $alert);
