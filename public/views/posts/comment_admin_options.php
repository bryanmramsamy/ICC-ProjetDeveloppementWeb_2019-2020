<?php
if (checkPermissions('modo', false) || (checkPermissions('user', false) && $_SESSION['userID'] == $comment['created_by'])){
    if (isset($comment['commentID']) && !empty($comment['commentID'])) $commentID = $comment['commentID'];
    else if (isset($comment['id']) && !empty($comment['id'])) $commentID = $comment['id'];
    
    # Visibility option (admin only)
    $publish_link = "index.php?action=post_comment_publish&commentID=" . $commentID;

    if (checkPermissions('modo', false) && $comment['is_visible']) echo("<a class=\"btn btn-info\" href='" . $publish_link . "'>Cacher le commentaire</a>");
    else if (checkPermissions('admin', false)) echo ("<a class=\"btn btn-info\" href='" . $publish_link . "'>Rendre le commentaire visible</a>");

    echo(' ');

    # Update option
    echo ("<a class=\"btn btn-primary\" href=\"index.php?action=post_comment_update&commentID=" . $commentID . "\">Modifier le commentaire</a>");
}
