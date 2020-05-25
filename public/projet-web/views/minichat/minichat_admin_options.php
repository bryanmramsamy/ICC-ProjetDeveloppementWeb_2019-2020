<?php
if (checkPermissions('modo', false) || $_SESSION['userID'] == $message['userID']){
    if (isset($message['messageID']) && !empty($message['messageID'])) $messageID = $message['messageID'];
    
    # Publication option
    if (checkPermissions('modo', false)) {
        $publish_link = "index.php?action=minichat_publish&messageID=" . $messageID;

        if ($message['is_visible']) echo("<a class=\"btn btn-info\" href='" . $publish_link . "'>Cacher le commentaire</a>");
        else echo("<a class=\"btn btn-info\" href='" . $publish_link . "'>Publier le commentaire</a>");
    }

    # Update option
    echo (" <a class=\"btn btn-primary\" href=\"index.php?action=minichat_update&messageID=" . $messageID . "\">Modifier le commentaire</a>");
}
