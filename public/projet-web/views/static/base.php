<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title><?= $title ?></title>
    </head>

    <body>
        <div class="container pt-2">
            <header>
                <a style="text-decoration: none" href="index.php">
                    <div class="text-center text-dark border border-secondary rounded">
                        <h1>ICC-2020 PROJET DE DÉVELOPPEMENT WEB</h1>
                        <h2>Bienvenue sur le site de vente de matériel informatique, de livres et de matériel Hi-Fi</h2>
                    </div>
                </a>

                <div id='signals'>
                    <?php require("views/static/signal_messages.php"); ?>
                </div>

                <div id="login_area">
                    <?php signin(); ?>
                </div>

            </header>

            <div id="main_body">

                <nav id="navigation_section" class="pb-2">
                    <?php require("views/static/navigation.php"); ?>
                </nav>

                <div id="main_section">
                    <?= $main_section ?>
                </div>

            </div>

            <footer>

            </footer>

        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>

</html>
