<?php
# <- Previous step: See listpostsView.php
# Template-file, used by default on the whole app and will add the view-file HTML to the default HTML
?>

<!DOCTYPE html>
<html>
<!-- Template that will be reused in other pages -->
    <head>
        <meta charset:'utf-8' />
        <title><?= $title ?></title>
        <link href='style.css' rel='stylesheet' />

    </head>

    <body>
        <?= $content ?>

    </body>

</html>