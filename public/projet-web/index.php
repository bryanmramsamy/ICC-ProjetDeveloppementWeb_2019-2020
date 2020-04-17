<?php
session_start();

require('controller/backend.php');
require('controller/frontend.php');


const MINICHAT_NB_MESSAGE_PER_PAGE = 10;
const POSTS_NB_POST_PER_PAGE = 10;

try {
    if (isset($_GET['page']) && !empty($_GET['page'])) $page = $_GET['page'];

    if (isset($_GET['action']) && !empty($_GET['action'])) {
        switch ($_GET['action']) {
            case 'admin':
                home();
                break;

            case 'forbidden':
                forbidden();
                break;

            case 'home':
                home();
                break;

            case 'minichat':
                minichat($page, MINICHAT_NB_MESSAGE_PER_PAGE);
                break;

            case 'minichat_post':
                minichat_post();
                break;

            case 'post':
                if (isset($_GET['postID']) && !empty($_GET['postID'])) post($_GET['postID']);
                else posts($page, POSTS_NB_POST_PER_PAGE);
                break;

            case 'posts':
                posts($page, POSTS_NB_POST_PER_PAGE);
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
