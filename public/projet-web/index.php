<?php
session_start();

require('controller/meta.php');
require('controller/backend.php');
require('controller/frontend.php');

const MINICHAT_NB_MESSAGE_PER_PAGE = 10;
const POSTS_NB_COMMENT_PER_PAGE = 10;
const POSTS_NB_POST_PER_PAGE = 10;

try {
    if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0) $page = $_GET['page'];

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
                post($page, POSTS_NB_COMMENT_PER_PAGE);
                break;

            case 'post_comment_create_post':
                post_comment_create_post();
                break;

            case 'post_comment_update':
                post_comment_update();
                break;

            case 'post_comment_update_post':
                post_comment_update_post();
                break;

            case 'post_comment_publish':
                post_comment_publish();
                break;

            case 'post_create':
                post_create();
                break;

            case 'post_create_post':
                post_create_post();
                break;

            case 'post_update':
                post_update();
                break;
            
            case 'post_update_post':
                post_update_post();
                break;

            case 'post_publish':
                post_publish();
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
                not_found();
                break;
        }
    } else {
        home();
    }
    
} catch (Exception $e) {
    echo ('Erreur: ' . $e->getMessage());
    echo ("<br/><a href='index.php'>Revenir à l'accueil</a>");
}
