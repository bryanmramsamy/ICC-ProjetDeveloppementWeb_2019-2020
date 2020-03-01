<?php $title = 'Mon super blog';  #  Assign 'Mon blog' as $titre value to be used in template ?>

<?php ob_start();  # Start to store all the content to be saved in a single variable ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>
 
<?php while ($data = $req->fetch()) { ?>

    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']); ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['content']));?>
            <br />
            <em><a href="post.php?id=<?= $data['id']; ?>">Commentaires</a></em>
        </p>
    </div>

<?php
}

$req->closeCursor();
?>

<?php $content = ob_get_clean();  # Assign the variable with the value collection in ob_start()/ob_get_clean()
# The variable $content can now be used in the template ?>

<?php require('template.php'); ?>