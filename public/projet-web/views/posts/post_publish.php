<?php
if ($_SESSION['user_role_lvl'] >= PERMISSION['admin']){
    if (isset($post['postID']) && !empty($post['postID'])) $postID = $post['postID'];
    
    $publish_link = "index.php?action=post_publish&postID=" . $postID;

    if ($post['is_published']) {
        $published_status = "Ce billet est publié (<a href='" . $publish_link . "'>Cacher le billet</a>)";
    } else {
        $published_status = "Ce billet n'est publié et n'est visible que par les administrateurs ! (<a href='" . $publish_link . "'>Publier le billet</a>)";
    }

    echo($published_status);
}
?>