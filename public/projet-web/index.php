<?php
session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action']) && !empty($_GET['action'])) {

        if ($_GET['action'] == 'home') {

            home();

        } else if ($_GET['action'] == 'connect') {



        } else if ($_GET['action'] == 'disconnect') {

            disconnect();
            home();

        } else if ($_GET['action'] == 'register') {

            register();

        } else if ($_GET['action'] == 'register_post') {
            # ENVOYER DONNEES ICI
            # $username, $hashed_password, $email, $last_name, $first_name, $birthday
            if (isset($_POST['input_username']) && !empty($_POST['input_username'])
                && isset($_POST['input_password']) && !empty($_POST['input_password'])
                && isset($_POST['input_password_confirmation']) && !empty($_POST['input_password_confirmation'])) {
                
                register_post($_POST['input_username'],
                              $_POST['input_password'],
                              $_POST['input_password_confirmation'],
                              (isset($_POST['input_email']) && !empty($_POST['input_email'])) ? $_POST['input_email'] : 'null',
                              (isset($_POST['input_last_name']) && !empty($_POST['input_last_name'])) ? $_POST['input_last_name'] : 'null',
                              (isset($_POST['input_first_name']) && !empty($_POST['input_first_name'])) ? $_POST['input_first_name'] : 'null');

            } else {
                register();
            }

        }


        
    } else {
        home();
    }
    
} catch (Exception $e) {
    echo ('Erreur: ' . $e->getMessage());
    echo ("<br/><a href='index.php'>Revenir à l'accueil</a>");

}