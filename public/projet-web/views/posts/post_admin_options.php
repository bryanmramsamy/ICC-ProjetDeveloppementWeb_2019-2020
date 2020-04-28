<?php
if (checkPermissions('admin', false)){
    if (isset($post['postID']) && !empty($post['postID'])) $postID = $post['postID'];
    else if (isset($post['id']) && !empty($post['id'])) $postID = $post['id'];
    
    # Publication option
    $publish_link = "index.php?action=post_publish&postID=" . $postID;

    if ($post['is_published']) {
        $published_status = "Ce billet est publié <a class=\"btn btn-primary\" href='" . $publish_link . "'>Cacher le billet</a>";
    } else {
        $published_status = "Ce billet n'est publié et n'est visible que par les administrateurs ! <a class=\"btn btn-success\" href='" . $publish_link . "'>Publier le billet</a>";
    }

    echo($published_status);

    echo(' ');

    # Update option
    echo ("<a class=\"btn btn-secondary\" href=\"index.php?action=post_update&postID=" . $postID . "\">Modifier</a>");
}
?>