<?php
if (checkPermissions('modo', false)){
    if (isset($post['postID']) && !empty($post['postID'])) $postID = $post['postID'];
    else if (isset($post['id']) && !empty($post['id'])) $postID = $post['id'];
    
    # Publication option
    $publish_link = "index.php?action=post_publish&postID=" . $postID;

    if ($post['is_published']) {
        echo("<a class=\"btn btn-info\" href='" . $publish_link . "'>Cacher le billet</a>");
    } else {
        echo("<a class=\"btn btn-info\" href='" . $publish_link . "'>Publier le billet</a>");
    }

    # Update option
    echo (" <a class=\"btn btn-info\" href=\"index.php?action=post_update&postID=" . $postID . "\">Modifier le billet</a>");
}
