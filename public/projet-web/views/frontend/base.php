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
                <nav>

                </nav>

                <div id="main_section">
                    <?= $main_section ?>
                </div>  <!-- main_section -->
            </div>  <!-- main_body -->

            <footer>
                <!-- TEST ZONE -->
                    <?php 
                        require_once('models/UserManager.php');

                        use \ProjetWeb\Model\UserManager;


                        $user = 'bryan';
                        $id = '2';

                        $um = new UserManager();

                        // $um->getUser($username, $isID);
                        $u = $um->getUser_byUsername($user);
                        echo ($u['id']);
                        

                    ?>
                <!-- END TEST ZONE -->
            </footer>
        </div>  <!--main_wrapper -->
    </body>
</html>