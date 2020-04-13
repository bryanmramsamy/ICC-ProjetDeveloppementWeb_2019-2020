<?php
session_start();

require('controller/backend.php');
require('controller/frontend.php');

try {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        switch ($_GET['action']) {
            case 'admin':
                home();
                break;

            case 'forbidden':
                home();
                break;

            case 'home':
                home();
                break;

            case 'profile':
                profile();
                break;

            case 'register':
                register();
                break;
            
            case 'register_post':
                register_post();
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
