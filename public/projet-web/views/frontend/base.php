<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
    </head>

    <body>
        <div id="main_wrapper">
            <header>
                <h1><a href="index.php">ICC-2020 Web Project</a></h1>
                <h2>Bienvenue sur le site de vente de matériel et de documentation informatique !</h2>

                <div id="login_area">
                    <?php require("signin.php") ?>
                </div>
            </header>

            <div id="main_body">
                <nav id="navigation_section">
                    <?php require("navigation.php") ?>
                </nav>

                <div id="main_section">
                    <?= $main_section ?>
                </div>  <!-- main_section -->
            </div>  <!-- main_body -->

            <footer>

            </footer>
        </div>  <!--main_wrapper -->
    </body>
</html>