<?php
if (checkPermissions('admin', false) || $_SESSION['userID'] == $comment['created_by']){
    if (isset($comment['commentID']) && !empty($comment['commentID'])) $commentID = $comment['commentID'];
    else if (isset($comment['id']) && !empty($comment['id'])) $commentID = $comment['id'];
    
    # Visibility option
    $publish_link = "index.php?action=post_comment_publish&commentID=" . $commentID;

    if ($comment['is_visible']) {
        $visibility = "Ce commentaire est visible (<a href='" . $publish_link . "'>Cacher</a>)";
    } else {
        $visibility = "Ce commentaire est caché (<a href='" . $publish_link . "'>Rendre visible</a>)";
    }

    echo($visibility);

    echo(' ');

    # Update option
    echo ("(<a href=\"index.php?action=post_comment_update&commentID=" . $commentID . "\">Modifier</a>)");
}
?>