<?php
session_start();

require('controller/backend.php');
require('controller/frontend.php');

try {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        switch ($_GET['action']) {
            case 'home':
                home();
                break;

            case 'signin':
                signin();
                break;

            case 'signin_post':
                signin_post();
                break;

            case 'signout':
                signout();
                break;

            case 'register':
                register();
                break;
            
            case 'register_post':
                register_post();
                break;

            default:
                home();
                break;
        }
    } else {
        home();
    }
    
} catch (Exception $e) {
    echo ('Erreur: ' . $e->getMessage());
    echo ("<br/><a href='index.php'>Revenir à l'accueil</a>");

}
