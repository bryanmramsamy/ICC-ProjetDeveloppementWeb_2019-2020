<?php $title='Modifier un commentaire' ?>

<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des billets</a></p>
<p><a href="index.php?action=post&amp;id=" <?= $comment['post_id'] ?>>Retour au billet</a></p>

<h1><?= htmlspecialchars($comment['author']) ?> le <?= $comment['comment_date_fr'] ?></h1>
<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

<form action="index.php?action=setComment&amp;postID=<?= $comment['post_id']?>&amp;commentID=<?= $comment['id'] ?>" method='post'>
    <div>
        <label for='comment'>Commentaire</label>
        <textarea id='comment' name='comment'></textarea>
    </div>

    <div>
        <input type=submit />
    </div>

</form>

<?php

// $comment->closeCursor();

$content = ob_get_clean();
require('template.php');

?>