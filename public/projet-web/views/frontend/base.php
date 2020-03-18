<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
    </head>

    <body>
        <div id="main_wrapper">
            <header>
                <h1>ICC-2020 Web Project</h1>
                <h2>Bienvenu sur le site de vente de matériel et de documentation informatique !</h2>

                <div id="login_area">
                    <?php require("signin.php") ?>
                </div>
            </header>

            <div id="main_body">
                <nav>

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